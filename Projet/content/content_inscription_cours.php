<p>Les ateliers couture sont ouverts à tous les élèves de la promo, sont gratuits et dispensés par des professionels de la couture.<br />
Aucun prérequis n'est évidemment nécessaire, il y a des groupes de niveau. Inscrivez vous ci-dessous :</p>

<?php
if ($_SESSION["loggedIn"]){
    $login=$_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"]=="inscription_cours"){
        $user=Utilisateur::getUtilisateur($dbh,$login);
        if($user == false){
            echo "<p> Vous devez être identifié pour pouvoir vous inscrire à un événement</p>";
        } else{
            if (!Utilisateur::testerMdp($dbh,$user,$_POST['mdp'])){
                echo "<p style='color:#FF0000'> Mot de passe incorrect</p>";
                printEventForm();
            } else{
                insererInscription($id_evenement,$login)
            }
    } else printFormDeletingAccount();

} else echo "<p>Connectez vous pour vous inscrire</p>";
    ?>

