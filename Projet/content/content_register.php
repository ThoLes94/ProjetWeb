<?php
$form_value_valid=false;

if(isset($_POST["prenom"]) && $_POST["prenom"] != "" 
    && isset($_POST["nom"]) && $_POST["nom"] != "" 
    && isset($_POST["email"]) && $_POST["email"] != ""  
    &&isset($_POST["naissance"]) && $_POST["naissance"] != "" 
    && isset($_POST["login"]) && $_POST["login"] != "" 
    && isset($_POST["up"]) && $_POST["up"] != "" && $_POST["up"]==$_POST["up2"]) {
    $form_value_valid=true;
    echo "traitement";
} 
if (!$form_value_valid) {
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
<form action="index.php?todo=register&page=register" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
<p>Nom d'utilisateur : <input type="text" name="login" value="<?php echo htmlspecialchars($login) ?>" required /></p>
<p>Prénom : <input type="text" name="prenom" value="<?php echo htmlspecialchars($prenom) ?>" required /></p>
<p>Nom : <input type="text" name="nom" value="<?php echo htmlspecialchars($nom) ?>" required /></p>
<p>Promotion : <input type="number" name="promotion" value="<?php echo htmlspecialchars($promostion) ?>"/></p>
<p>Date de naissance : <input type="date" name="naissance" value="<?php echo htmlspecialchars($naissance) ?>" required /></p>
<p>adresse mail : <input type="email" name="email" value="<?php echo htmlspecialchars($email) ?>" required /></p>
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