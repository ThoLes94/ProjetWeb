<?php
function printFormRegister(){ 
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
    <form action="index.php?todo=register&page=inscription" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
    <p>Nom d'utilisateur : <input type="text" name="login" value="<?php echo $login ?>" required /></p>
    <p>Prénom : <input type="text" name="prenom" value="<?php echo $prenom ?>" required /></p>
    <p>Nom : <input type="text" name="nom" value="<?php echo $nom ?>" required /></p>
    <p>Promotion : <input type="number" name="promotion" value="<?php echo $promostion ?>"/></p>
    <p>Date de naissance : <input type="date" name="naissance" value="<?php echo $naissance ?>" required /></p>
    <p>adresse mail : <input type="email" name="email" value="<?php echo $email ?>" required /></p>
    <p>
        <label for="password1">Password:</label>
        <input id="password1" type=password required name=up>
    </p>
    <p>
        <label for="password2">Confirm password:</label>
        <input id="password2" type=password name=up2>
    </p>
    <p> Choisissez votre style
    <select name="feuille" id="style-select">
        <option value="">--Please choose an option--</option>
        <option value="feuille1">Style1</option>
        <option value="feuille2">Style2</option>
    </select>
    </p>
    <input type=submit value="Create account">

    </form>
    <?php
}

function printFormChange(){
    $prenom=$_SESSION['prenom'];
    echo "<p> Bonjour $prenom, </p>";
    echo "<p> Veuillez remplir le formulaire ci-dessous pour changer de mot de passe </p>";
?>
<form action="index.php?todo=changePassword&page=changePassword" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
<p> Ancien mot de passe : <input id="oldpassword" type=password required name=old> </p>
<p>
    <label for="password1">Nouveau mot de passe:</label>
    <input id="password1" type=password required name=up>
</p>
<p>
    <label for="password2">Confirmation du mot de passe:</label>
    <input id="password2" type=password name=up2>
</p>
<input type=submit value="Changer le mot de passe">
</form>
<?php
}

function printFormDeletingAccount(){
    $prenom=$_SESSION['prenom'];
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