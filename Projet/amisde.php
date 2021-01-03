<?php
    require "scripts/Database.php";
    require "scripts/Utilisateur.php";
    require('utilities/utils.php');
if (isset($_GET['login'])) {
    amisde($_GET['login']);
} else {
    echo "ERREUR, veuillez retournez à l'accueil";
    generateHTMLHeader("ERREUR", "css/perso.css");
    echo "<nav id='menu'>";
        generateMenu();
    echo "</nav>";
    require('content/content_'.'welcome'.'.php');
    generateHTMLFooter();
}

function amisde($login){
        $dbh = Database::connect();
        $user=Utilisateur::getUtilisateur($dbh,$login);
        $pageTitle="Amis de ".$user->prenom." ".$user->nom; 
        generateHTMLHeader($pageTitle, "css/perso.css");
        echo "<nav id='menu'>";
            generateMenu();
        echo "</nav>";
        echo "<div class='container' id = 'content'>";
            echo '<h1>'.$pageTitle.'</h1>';
            echo "<div class='container'>";
                $table=$user->getAmis();
                foreach ($table as $v1) {
                    echo $v1.'<br>';
                }
            echo "</div>";
        echo "</div>";
        generateHTMLFooter();
    }
?>