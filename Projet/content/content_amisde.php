<?php
if ($_SESSION['loggedIn']){
    if (isset($_GET['login'])) {
        echo "<div class='container'>";
        $table=$user->getAmis($dbh);
        foreach ($table as $v1) {
            echo '<p>'.$v1.'<br>'.'</p>'. PHP_EOL;
        }
        echo "</div>";
    } else {
        echo "ERREUR, veuillez retournez à l'accueil<br>";
        echo "<a type='button' href='index.php?page=welcome'>Acceuil </a>";
    }
} else {
    echo "<p> Vous devez être connecté pour accéder à la base de données. </p>";
}

?>