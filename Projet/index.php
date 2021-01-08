<?php
    require('utilities/utils.php'); 
    require "scripts/Database.php";
    require "scripts/Utilisateur.php";
    $dbh = Database::connect();
    if(isset($_GET['page'])){
        $askedPage = $_GET['page'];
    }
    else {
        echo "<p><strong>Le nom donné est inexistant, affichage par défaut!</strong></p>";
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