<h2>Créez votre compte chez nous</h2>
<?php
$form_value_valid=false;

if(isset($_POST["prenom"]) && $_POST["prenom"] != "" 
    && isset($_POST["nom"]) && $_POST["nom"] != "" 
    && isset($_POST["email"]) && $_POST["email"] != ""  
    &&isset($_POST["naissance"]) && $_POST["naissance"] != "" 
    && isset($_POST["login"]) && $_POST["login"] != "" 
    && isset($_POST["up"]) && $_POST["up"] != "" && $_POST["up"]==$_POST["up2"]) {
    $form_value_valid=true;
    echo "<h3>Compte créé!!</h3>";
    echo "<p> Vous pouvez retourner à l'acceuil </p>";
} else {
    if (isset($_POST["login"])){
        if ($_POST["login"]==false){
            echo "<h3>Nom d'utilisateur déjà existant!!</h3>";
            $login="";
        } else {
            $login = $_POST["login"];
        }
    } else $login = "";
    if (isset($_POST["prenom"])) $prenom = $_POST["prenom"];
    else $prenom = "";
    if (isset($_POST["email"])) $email = $_POST["email"];
    else $email = "";
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
?>
