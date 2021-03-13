<?php
session_name("BananePoire");
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}

require "utilities/utils.php";
require "scripts/Database.php";
require "scripts/Utilisateur.php";
require "logInOut/printForms.php";
require "logInOut/logInOut.php";
require "register/PrintChangeRegister.php";
require "register/PrintEventForm.php";
require "scripts/utils.php";
require "EventAddRemove/AddRemove.php";
require "EventAddRemove/printFormEvent.php";
require "scripts/inscription.php";
require "register/addRemoveParticipants.php";


$dbh = Database::connect();
if (isset($_GET['page'])) {
    $askedPage = $_GET['page'];
} else {
    $askedPage = "welcome";
}
$authorized = checkPage($askedPage);
if ($authorized) {
    $pageTitle = getPageTitle($askedPage);
    if (isset($_GET['login']) &&  strcmp($pageTitle, "Amis de ") == 0) {
        $user = Utilisateur::getUtilisateur($dbh, $_GET['login']);
        $pageTitle = "Amis de " . $user->prenom . " " . $user->nom;
    }
} else {
    $pageTitle = "Erreur";
}
if (isset($_GET["todo"])) {
    if ($_GET["todo"] == "login") {
        logIn($dbh);
    }
    if ($_GET["todo"] == "logout") {
        logOut();
    }
}
generateHTMLHeader($pageTitle, "css/perso.css");
echo "<nav id='menu'>";
generateMenu();
echo "</nav>";
if (isset($_GET["todo"]) && $_GET["todo"] == "connexion") {
    if (isset($_SESSION['loggedIn'])) {
        printLogoutForm();
    } else {
        printLoginForm();
    }
}
if (isset($_GET["todo"]) && $_GET['todo'] == "removeInscription") {
    if (Inscription::removeInscription($dbh, $_POST['id_eleve'], $_POST["id_event"])) {
        echo '<script> myAlert("Désinscription <i>éffectuée</i>", "myalert-success")</script>';
    } else echo '<script> myAlert("Désinscription <i>échouée</i>", "myalert-danger")</script>';
}
if (isset($_GET['todo']) && $_GET['todo'] == "addEvent") {
    if (addEvent($dbh)) {
        echo '<script> myAlert("Evénement <i>sauvegardé</i>", "myalert-success")</script>';
    } else echo '<script> myAlert("Sauvegarde <i>échouée</i>", "myalert-danger")</script>';
}

if (isset($_GET['todo']) && $_GET['todo'] == "removeEvent") {
    if (removeEvent($dbh)) {
        echo '<script> myAlert("Suppression <i>réussie</i>", "myalert-success")</script>';
    } else echo '<script> myAlert("Suppression <i>échouée</i>", "myalert-danger")</script>';
}
echo "<div class='container' id = 'content'>";
echo '<h1>' . $pageTitle . '</h1>';
if (checkPage($askedPage)) {
    require('content/content_' . $askedPage . '.php');
} else {
    echo "<p>Désolé, vous êtes trop gentlemen pour accéder à la page demandée.</p>";
}
echo "</div>";
generateHTMLFooter();



$dbh = null;
