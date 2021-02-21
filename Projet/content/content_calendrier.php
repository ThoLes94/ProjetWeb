<?php
if (!isset($_SESSION["loggedIn"])){
    echo "<div><h2>Connectez-vous pour voir les événements</h2></div>";
    return;
}

if (isset($_SESSION['isAdmin'])){
    require("scripts\content_creerEvenement.php"); 
} else require("scripts\calendrier.php");


