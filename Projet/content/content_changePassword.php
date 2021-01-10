<?php 

if ($_SESSION["loggedIn"]){
    $login=$_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"]=="changePassword"){
        if (!isset($_POST["up"]) || !isset($_POST["up2"]) || $_POST["up"]!= $_POST["up2"]){
            printFormChange($dbh);
        } else {
            $user=Utilisateur::getUtilisateur($dbh,$login);
            if ($user == false){
                echo "<p> Vous devez être identifié pour pouvoir changer votre mot de passe</p>";
            } else {
                if (!isset($_POST['old']) || !Utilisateur::testerMdp($dbh,$user,$_POST['old'])){
                    printFormChange($dbh);
                } else {
                    Utilisateur::changePassword($dbh,$login,$_POST["up"]);
                    echo "<p> Mot de passe changé</p>"; 
                }
            }
        }
    } else printFormChange($dbh);


} else echo "<p> Connectez vous pour pouvoir changer votre mot de passe </p>";

?>