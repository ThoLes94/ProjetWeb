<?php
    require('utilities/utils.php');
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
    }
    else {
        $pageTitle = "Erreur";
    }

    
    echo "</div>";
    generateHTMLFooter();

    generateHTMLHeader("Projet final", "css/perso.css");
    echo "<nav id='menu'>";
        generateMenu();
    echo "</nav>";
    generateHTMLHeader($pageTitle, "css/perso.css");
    echo "<div id = 'content'>";
        echo '<h1>'.$pageTitle.'</h1>';
        if(checkPage($askedPage)){
            require('content/content_'.$askedPage.'.php');
        }
        else {
            echo "<p>Désolé, vous êtes trop gentlemen pour accéder à la page demandée.</p>";
        }

    generateHTMLFooter();
?>