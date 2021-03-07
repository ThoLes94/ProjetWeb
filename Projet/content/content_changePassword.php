<?php

if (isset($_SESSION["loggedIn"])) {
    echo "<script src=js/moncompte.js></script>";
    $user = Utilisateur::getUtilisateur($dbh, $_SESSION['login']);
    $prenom = $user->prenom;
    echo "<div><p> Bonjour $prenom,<br> Ici vous avez accès à toutes vos inscriptions et à la gestion de votre compte";
    $login = $_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"] == "changePassword") {
        if (!isset($_POST["up"]) || !isset($_POST["up2"]) || $_POST["up"] != $_POST["up2"]) {
            printFormChange($dbh);
        } else {
            $user = Utilisateur::getUtilisateur($dbh, $login);
            if ($user == false) {
                echo "<p> Vous devez être identifié pour pouvoir changer votre mot de passe</p>";
            } else {
                if (!isset($_POST['old']) || !Utilisateur::testerMdp($dbh, $user, $_POST['old'])) {
                    printFormChange($dbh);
                } else {
                    if (Utilisateur::changePassword($dbh, $login, $_POST["up"])) echo '<script> myAlert("Mot de passe changé", "myalert-success")</script>';
                    else echo '<script> myAlert("Changement de mot de passe <i>échoué</i>", "myalert-danger")</script>';
                }
            }
        }
    }
    if (isset($_GET["todo"]) && $_GET['todo'] == "removeInscription") {
        if (Inscription::removeInscription($dbh, $_POST['id_eleve'], $_POST["id_event"])) {
            echo "<h3> Vous avez été désinscrit </h3>";
        } else echo "<h1>Erreur</h1>";
    }
    echo "<div class='container w3-margin'><a onclick='showTable()' class='w3-btn w3-round w3-card'>Voir mes inscriptions</a></div>";
    echo <<<CHAINE
        <div id="table" class="w3-hide">
    <div class="demo-html">
        <div>
            <table class="display table table-striped table-bordered" id="example" style="max-width:80%   cellspacing='0'">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom de l'événement</th>
                        <th>Date</th>
                        <th>Heure de début</th>
                        <th>Heure de fin</th>
                        <th>Lieu</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th>Nom de l'événement</th>
                        <th>Date</th>
                        <th>Heure de début</th>
                        <th>Heure de fin</th>
                        <th>Lieu</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<script src="js/tablenonadmin.js"></script>
<script src="js/datatables.filters.js"></script>
CHAINE;
    echo "<div class='container w3-margin'><a onclick='showFormChange()' class='w3-btn w3-round w3-card'>Changer mon mot de passe</a></div>";
    echo "<div id='formulaire' class='w3-hide'>";
    printFormChange($dbh);
    echo "</div>";
} else {
    echo "<p> Connectez vous pour pouvoir changer votre mot de passe </p>";
    printLoginForm();
}
