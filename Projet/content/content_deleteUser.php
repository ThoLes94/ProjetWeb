<?php
if ($_SESSION["loggedIn"]){
    $login=$_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"]=="deleteUser"){
        $user=Utilisateur::getUtilisateur($dbh,$login);
        if($user == false){
            echo "<p> Vous devez être identifié pour pouvoir supprimer votre compte</p>";
        } else{
            if (!Utilisateur::testerMdp($dbh,$user,$_POST['mdp'])){
                echo "<p style='color:#FF0000'> Mot de passe incorrect</p>";
                printFormDeletingAccount();
            } else {
                Utilisateur::deleteUser($dbh, $login);
                logOut();
                echo <<<CHAINE_DE_FIN
<div id="content">
<p>Compte supprimé</p>
<p>Vous allez être redirigé vers la page d'acceuil</p> 
</div>
<script type="text/javascript">
    setTimeout(function() {
        location.href = 'index.php'
    }, 3000); // 5000 is the time to wait (ms) -> 5 seconds
</script>
CHAINE_DE_FIN;
            }
        }
    } else printFormDeletingAccount();

} else echo "<p>Connectez vous pour supprimer votre compte</p>";
?>

