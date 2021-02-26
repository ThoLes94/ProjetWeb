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
    require "scripts/Evenement.php";
    require "logInOut/printForms.php";
    require "logInOut/logInOut.php";
    require "register/PrintChangeRegister.php";
    require "register/PrintEventForm.php";
    require "scripts/utils.php";
    

    $dbh = Database::connect();
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
    if(isset($_GET["todo"])){
        if ($_GET["todo"] == "login") {
            logIn($dbh);
        }
        if ($_GET["todo"] == "logout"){
            logOut();
        }
    }
    generateHTMLHeader($pageTitle, "css/perso.css");
    echo "<nav id='menu'>";
        generateMenu();
    echo "</nav>";
    if (isset($_GET["todo"]) && $_GET["todo"] == "connexion"){
        if(isset($_SESSION['loggedIn'])) {
            printLogoutForm();
        } else {
            printLoginForm();
        }
    }
    if (isset($_GET['todo']) && $_GET['todo'] == "addEvent") {
        $id = bin2hex(random_bytes(12) );
        if (isset($_POST['idevent']) && $_POST['idevent']!='test'){
            $id = $_POST['idevent'];
            $test= Event::deleteEvent($dbh, $id, TRUE);  
        } 
        $nom = $_POST['nom'];
        $desc = $_POST['description'];
        $start = new DateTime($_POST['jour'] . ' ' . $_POST['start']);
        $lieu = $_POST['lieu'];
        $categorie = "bonjour";
        $end = new DateTime($_POST['jour'] . ' ' . $_POST['end']);
        $event = Event::getEvenement($dbh, $id);
        while ($event != false) {
            $id = bin2hex(random_bytes(12));
            $event = Event::getEvenement($dbh, $id);
        }
        Event::insererEvenement($dbh, $id, $nom, $start, $end, $desc, $categorie, $lieu);
    }
    
    if (isset($_GET['todo']) && $_GET['todo'] == "removeEvent") {
        if (!isset($_POST['idevent'])) echo 'erreur';
        $id = $_POST['idevent'];
        $test= Event::deleteEvent($dbh, $id, FALSE);    
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