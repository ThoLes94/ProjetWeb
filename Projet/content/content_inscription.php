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
        echo "<p>Vous allez être redirigé vers la page d'acceuil</p> ";
        echo <<<CHAINE
        <script type="text/javascript">
    setTimeout(function() {
        location.href = 'index.php'
    }, 3000); // 5000 is the time to wait (ms) -> 5 seconds
</script>
CHAINE;
        $form_value_valid=true;
    }
} if(!$form_value_valid) {
    if (isset($_GET["todo"]) && $_GET["todo"]=="register"){
        if (!isset($_POST["prenom"]) || $_POST["prenom"] == "" ) echo "<p style='color:#FF0000'> cPrénom non valide </p>";
        if (!isset($_POST["nom"]) || $_POST["nom"] == "" ) echo "<p style='color:#FF0000'> Nom non valide </p>";
        if (!isset($_POST["naissance"]) || $_POST["naissance"] == "") echo "<p style='color:#FF0000'> Date de naissance non valide </p>";
        if (!isset($_POST["email"]) || $_POST["email"] == "") echo "<p style='color:#FF0000'> Adresse mail non valide</p>";
        if (!isset($_POST["login"]) || $_POST["login"] == "" ) echo "<p style='color:#FF0000'>login incorrect</p>";
        $user=Utilisateur::getUtilisateur($dbh,$_POST["login"]);
        if ($user!=false){
            echo "<p style='color:#FF0000'>Nom d'utilisateur déjà existant</p>";
        
        }
        if (!isset($_POST["up"]) || !isset($_POST["up2"]) || $_POST["up"] == "") echo "<p style='color:#FF0000'> Mot de passe non valide</p>";
        else if ($_POST["up"]!=$_POST["up2"]) echo "<p style='color:#FF0000'>Les deux mots de passe ne sont pas identiques</p>";
    }
    printFormRegister();
}
?>
