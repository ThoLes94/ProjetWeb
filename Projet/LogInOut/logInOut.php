<?php 
function logIn($dbh){
    if(isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["mdp"]) && $_POST["mdp"] != "") {
        $login=$_POST["login"];
        $mdp=$_POST["mdp"];
        $user=Utilisateur::getUtilisateur($dbh,$login);
        if ($user!=false && Utilisateur::testerMdp($dbh,$user,$mdp) ){
            $_SESSION['loggedIn']=true;
        }
    }
}

function logOut(){
    unset($_SESSION['loggedIn']);
    $_SESSION['loggedIn']=false;
}