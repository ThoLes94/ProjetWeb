<?php 

if ($_SESSION["loggedIn"]){
    $login=$_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"]=="changePassword"){
        if ($_POST["up"]!= $_POST["up2"]){
            echo "<p> Les deux mots de passe sont différents!</p>";
            printFormChange();
        } else {
            $user=Utilisateur::getUtilisateur($dbh,$login);
            if ($user == false){
                echo "<p> Vous devez être identifié pour pouvoir changer votre mot de passe</p>";
            } else {
                if (!Utilisateur::testerMdp($dbh,$user,$_POST['old'])){
                    echo "<p> Ancien mot de passe incorrect</p>";
                    printFormChange();
                } else {
                    Utilisateur::changePassword($dbh,$login,$_POST["up"]);
                    echo "<p> Mot de passe changé</p>"; 
                }
            }
        }
    } else printFormChange();


} else echo "<p> Connectez vous pour pouvoir changer votre mot de passe </p>";

?>