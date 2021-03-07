<p>Les ateliers couture sont ouverts à tous les élèves de la promo, sont gratuits et dispensés par des professionels de la couture.<br />
    Aucun prérequis n'est évidemment nécessaire, il y a des groupes de niveau. </p>


<?php
if (isset($_SESSION["loggedIn"])) {
    $login = $_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"] == "inscription_cours") {
        $user = Utilisateur::getUtilisateur($dbh, $login);
        if ($user == false) {
            echo "<p> Vous devez être identifié pour pouvoir vous inscrire à un événement</p>";
        } else {
            if (!Utilisateur::testerMdp($dbh, $user, $_POST['mdp'])) {
                echo "<p style='color:#FF0000'> Mot de passe incorrect</p>";
                printFormEvent($_POST['idevent'], $dbh);
            } else {
                if (Database::inscriptionUtilisateur($dbh, $login, $_POST['idevent'], $_POST['niveau'])){
                    echo '<script> myAlert("Inscription <i>réussie</i>", "myalert-success")</script>';
                }else echo '<script> myAlert("Inscription <i>échouée</i>", "myalert-danger")</script>';
                echo '<div class="w3-center"><a class="w3-button w3-card w3-round" href="?page=calendrier"> Calendrier</a> <a class="w3-button w3-card w3-round w3-margin" href="?page=changePassword">Accéder à mes inscriptions</a> </div>';
            }
        }
    } else {
        if (Utilisateur::estInscrit($dbh, $login, $_POST['idevent'])) {
            echo "<p style='color:red' > Vous êtes déjà inscrit à cette événement! </p>";
            echo '<p> Vous pouvez retourner voir les événements en cliquant ici:</p>';
            echo '<div class="w3-center"><a class="w3-button w3-card w3-round w3-margin" href="?page=calendrier">Retouner au Calendrier</a> <a class="w3-button w3-card w3-round w3-margin" href="?page=changePassword">Accéder à mes inscriptions</a> </div>';
        } else printFormEvent($_POST['idevent'], $dbh);
    }
} else echo "<p>Connectez vous pour vous inscrire</p>";

?>