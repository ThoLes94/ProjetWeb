<?php 
function logIn($dbh){
    if(isset($_POST["login"]) && $_POST["login"] != "" && isset($_POST["mdp"]) && $_POST["mdp"] != "") {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $user = Utilisateur::getUtilisateur($dbh,$login);
        if ($user != false && Utilisateur::testerMdp($dbh,$user,$mdp) ){
            $_SESSION['loggedIn'] = true;
            $_SESSION['login'] = $user->login;
            $_SESSION['prenom']=$user->prenom;
            $_SESSION['nom']=$user->nom;
            if ($user->isAdmin){
                $_SESSION['isAdmin']=true;
            }
        } else $_GET["todo"]= "connexion";
    } else $_GET["todo"]= "connexion";
}

function logOut(){
    unset($_SESSION['loggedIn']);
    unset($_SESSION['login']);
    unset($_SESSION['prenom']);
    unset($_SESSION['nom']);
    unset($_SESSION['isAdmin']);
}