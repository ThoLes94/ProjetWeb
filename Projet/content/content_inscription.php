<h2>Créez votre compte chez nous</h2>
<?php
$form_value_valid=false;

if(isset($_POST["prenom"]) && $_POST["prenom"] != "" 
&& isset($_POST["nom"]) && $_POST["nom"] != "" 
&& isset($_POST["email"]) && $_POST["email"] != ""  
&&isset($_POST["naissance"]) && $_POST["naissance"] != "" 
&& isset($_POST["login"]) && $_POST["login"] != "" 
&& isset($_POST["up"]) && isset($_POST["up2"]) && $_POST["up"] != "" && $_POST["up"]==$_POST["up2"]){
    $user=Utilisateur::getUtilisateur($dbh,$_POST["login"]);
    if ($user==false){
        if ($_POST["promotion"]==0) $promotion=null;
        else $promotion = $_POST["promotion"];
        Utilisateur::insererUtilisateur($dbh,$_POST["login"],$_POST["up"],$_POST["nom"],$_POST["prenom"],$promotion,$_POST["naissance"],$_POST["email"],$_POST["feuille"]);
        echo "<h3>Compte créé!!</h3>";
        echo "<p> Vous pouvez retourner à l'acceuil </p>";
        $form_value_valid=true;
    }
} if(!$form_value_valid) {
    if (isset($_GET["todo"]) && $_GET["todo"]=="register"){
        if (!isset($_POST["prenom"]) || $_POST["prenom"] == "" ) echo "<p> Prénom non valide </p>";
        if (!isset($_POST["nom"]) || $_POST["nom"] == "" ) echo "<p> Nom non valide </p>";
        if (!isset($_POST["naissance"]) || $_POST["naissance"] == "") echo "<p> Date de naissance non valide </p>";
        if (!isset($_POST["email"]) || $_POST["email"] == "") echo "<p> Adresse mail non valide</p>";
        if (!isset($_POST["login"]) || $_POST["login"] == "" ) echo "<p>login incorrect</p>";
        $user=Utilisateur::getUtilisateur($dbh,$_POST["login"]);
        if ($user!=false){
            echo "<p>Nom d'utilisateur déjà existant</p>";
        
        }
        if (!isset($_POST["up"]) || !isset($_POST["up2"]) || $_POST["up"] == "") echo "<p> Mot de passe non valide</p>";
        else if ($_POST["up"]!=$_POST["up2"]) echo "<p>Les deux mots de passe ne sont pas identiques</p>";
    }
    printFormRegister();
}
?>
