<?php
if (!isset($_SESSION['isAdmin'])) {
    echo "<h1> Réservé aux administrateurs</h1>";
    exit();
}



    echo "<div class='form col-md-6 w3-card w3-round w3-padding'>";
    printFormImage();
    echo "</div>";

    echo "<div class='w3-center'><a href='?page=photos' class='w3-card w3-round w3-btn'>Revenir à la galerie</a></div>";

echo "<script src='js/upload.js'></script>";