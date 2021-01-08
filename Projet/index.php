<?php
    session_name("BananePoire");
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
        $_SESSION['loggedIn'] = false;
    }
    require('utilities/utils.php'); 
    require "scripts/Database.php";
    require "scripts/Utilisateur.php";
    require "logInOut/printForms.php";
    require "logInOut/logInOut.php";
    $dbh = Database::connect();
    if(isset($_GET["todo"]) && $_GET["todo"] == "login") {
        logIn($dbh);
    }
    if(isset($_GET["todo"]) && $_GET["todo"] == "logout") {
        logOut();
    }
    if(isset($_GET['page'])){
        $askedPage = $_GET['page'];
    }
    else {
        $askedPage = "welcome";
    }
    $authorized=checkPage($askedPage);
    if($authorized){
        $pageTitle=getPageTitle($askedPage);
        if (isset($_GET['login']) &&  strcmp($pageTitle, "Amis de ")==0) {
            $user = Utilisateur::getUtilisateur($dbh,$_GET['login']);
            $pageTitle="Amis de ".$user->prenom." ".$user->nom; 
        }
    }
    else {
        $pageTitle = "Erreur";
    }
    generateHTMLHeader($pageTitle, "css/perso.css");
    echo "<nav id='menu'>";
        generateMenu();
    echo "</nav>";
    if($_SESSION['loggedIn']) {
        printLogoutForm();
    } else {
        printLoginForm();
    }
    echo "<div class='container' id = 'content'>";
        echo '<h1>'.$pageTitle.'</h1>';
        if(checkPage($askedPage)){
            require('content/content_'.$askedPage.'.php');
        }
        else {
            echo "<p>Désolé, vous êtes trop gentlemen pour accéder à la page demandée.</p>";
        }
    echo "</div>";
    generateHTMLFooter();
    $dbh = null;
?>