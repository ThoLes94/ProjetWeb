<?php
function addParticipant($dbh, $login)
{
    $user = Utilisateur::getUtilisateur($dbh, $login);
    if ($user == false) {
        echo "<p> Vous devez être identifié pour pouvoir vous inscrire à un événement</p>";
    } else {
        if (!Utilisateur::testerMdp($dbh, $user, $_POST['mdp'])) {
            echo "<p style='color:#FF0000'> Mot de passe incorrect</p>";
            if(!isset($_SESSION['isAdmin'])) printFormEvent($_POST['idevent'], $dbh);
        } else {
            if (isset($_SESSION['isAdmin'])) {
                $login = $_POST["login"];
            }
            if (Database::inscriptionUtilisateur($dbh, $login, $_POST['idevent'], $_POST['niveau'])) {
                echo '<script> myAlert("Inscription <i>réussie</i>", "myalert-success")</script>';
            } else echo '<script> myAlert("Inscription <i>échouée</i>", "myalert-danger")</script>';
            if(!isset($_SESSION['isAdmin'])) echo '<div class="w3-center"><a class="w3-button w3-card w3-round" href="?page=calendrier"> Calendrier</a> <a class="w3-button w3-card w3-round w3-margin" href="?page=changePassword">Accéder à mes inscriptions</a> </div>';
        }
    }
}
