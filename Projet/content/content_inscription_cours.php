<<<<<<< HEAD
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
                printFormEvent();
            } else{
                insererInscription($_POST['id_evenement'],$_POST['login'],$dbh);
                echo "<p> Votre inscription a bien été enregistré ! </p>";
            }
        }
    } else printFormEvent();

} else echo "<p>Connectez vous pour vous inscrire</p>";

    ?>

=======
>>>>>>> e507b20f73e386f6915e355adc51bb27dc127672
