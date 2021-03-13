<?php
function printFormRegister()
{
    if (isset($_POST["prenom"])) $prenom = $_POST["prenom"];
    else $prenom = "";
    if (isset($_POST["email"])) $email = $_POST["email"];
    else $email = "";
    if (isset($_POST["login"])) $login = $_POST["login"];
    else $login = "";
    if (isset($_POST["nom"])) $nom = $_POST["nom"];
    else $nom = "";
    if (isset($_POST["naissance"])) $naissance = $_POST["naissance"];
    else $naissance = "";
    if (isset($_POST["promotion"])) $promotion = $_POST["promotion"];
    else $promotion = null;
?>
<div class="col-md-3"></div>
<div class="form col-md-6  w3-card w3-round">
    <form action="index.php?todo=register&page=inscription" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
        <p>Nom d'utilisateur : <input type="text" name="login" value="<?php echo $login ?>" required /></p>
        <div class="col-md-6"><p>Prénom : <input type="text" name="prenom" value="<?php echo $prenom ?>" required /></p></div>
        <div class="col-md-6"><p>Nom : <input type="text" name="nom" value="<?php echo $nom ?>" required /></p></div>
        <div class="col-md-6"><p>Promotion : <input type="number" name="promotion" value="<?php echo $promotion ?>" /></p></div>
        <div class="col-md-6"><p>Date de naissance : <input type="date" name="naissance" value="<?php echo $naissance ?>" required /></p></div>
        <p>adresse mail : <input type="email" name="email" value="<?php echo $email ?>" required /></p>
        <div class="col-md-6"><p>
            <label for="password1">Password:</label>
            <input id="password1" type=password required name=up>
        </p></div>
        <div class="col-md-6"><p>
            <label for="password2">Confirm password:</label>
            <input id="password2" type=password name=up2>
        </p></div>
        <p> Choisissez votre style
            <select name="feuille" id="style-select">
                <option value="">--Please choose an option--</option>
                <option value="feuille1">Style1</option>
                <option value="feuille2">Style2</option>
            </select>
        </p>
        <input type=submit value="Create account">

    </form>
</div>
<?php
}

function printFormChange($dbh)
{
    echo "<p> Veuillez remplir le formulaire ci-dessous pour changer de mot de passe </p>";
    if (isset($_GET["todo"]) && $_GET["todo"] == "changePassword") {
        if (!isset($_POST["up"]) || !isset($_POST["up2"]) || $_POST["up"] != $_POST["up2"]) {
            echo "<p style='color:#FF0000'> Les deux mots de passe sont différents!</p>";
        }
        $user = Utilisateur::getUtilisateur($dbh, $_SESSION["login"]);
        if (!isset($_POST['old']) || !Utilisateur::testerMdp($dbh, $user, $_POST['old'])) {
            echo "<p style='color:#FF0000'> Ancien mot de passe incorrect</p>";
        }
    }
?>
    <div class="w3-center w3-padding w3-margin">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="w3-round w3-card col-md-6 w3-padding">
                <h3 class='w3-center' style="margin-top: 0px"> Changer de mot de passe </h3>

                <form class="form" action="index.php?todo=changePassword&page=changePassword" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
                    <p class="w3-center"> Ancien mot de passe :<br> <input id="oldpassword" type=password required name=old style="width:70%"> </p>
                    <p>
                        <label for="password1">Nouveau mot de passe:</label>
                        <input id="password1" type=password required name=up style="width:70%">
                    </p>
                    <p>
                        <label for="password2">Confirmation du mot de passe:</label>
                        <input id="password2" type=password name=up2 style="width:70%">
                    </p>
                    <input type=submit value="Changer le mot de passe" style="background-color:#3788D8">
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row w3-margin-top">
            <div class="col-md-3"></div>
            <div class="w3-round w3-card col-md-6 w3-padding">
                <h3 style="margin-top: 0px"> Supprimer mon compte </h3>
                <a href='index.php?page=deleteUser' class='w3-btn w3-card w3-round' style='background-color:#F05551'> Supprimer mon compte </a>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php
}

function printFormDeletingAccount()
{
    $prenom = $_SESSION['prenom'];
    echo "<p> Bonjour $prenom, </p>";
    echo "<p> Nous sommes tristes de vous voir partir, remplissez le formulaire ci-dessous pour valider votre désinscription </p>";
?>
    <form action="index.php?todo=deleteUser&page=deleteUser" method="post">
        <p>Mot de passe : <input type="password" name="mdp" required /></p>
        <p><input type="submit" value="Valider" /></p>
    </form>
<?php

}
?>