<?php
if ($_SESSION["loggedIn"]){
    $login=$_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"]=="deleteUser"){
        $user=Utilisateur::getUtilisateur($dbh,$login);
        if($user == false){
            echo "<p> Vous devez être identifié pour pouvoir supprimer votre compte</p>";
        } else{
            if (!Utilisateur::testerMdp($dbh,$user,$_POST['mdp'])){
                echo "<p> Mot de passe incorrect</p>";
                printFormDeletingAccount();
            } else {
                Utilisateur::deleteUser($dbh, $login);
                echo "<p>Compte supprimé</p>";
            }
        }
    } else printFormDeletingAccount();

    } else echo "<p>Connectez vous pour supprimer votre compte</p>";
?>

