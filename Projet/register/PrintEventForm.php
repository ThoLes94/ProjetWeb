<?php
function printFormEvent($idEvent, $dbh){
    $prenom=$_SESSION['prenom'];
    $event = Event::getEvenement($dbh, $idEvent);
    echo "<p> Bonjour $prenom, </p>";
    echo $idEvent;
    $login=$_SESSION['login'];

    echo "<p> Nous sommes ravis de voir que vous vous intéressez à cet événement, remplissez le formulaire ci-dessous pour confirmer votre inscription </p>";
    echo <<<CHAINE_DE_FIN
    <form action="index.php?todo=inscription_cours&page=inscription_cours" method="post">
    <p>Evénemment : <input type="int" required name='EventTitle' value='$event->title' disabled="disabled"/></p>
    <p>Nom d'utilisateur : <input type="text"  value='$login' disabled="disabled" required name="login"/></p>
    <p>Adresse e-mail : <input type="email" name="email" required /></p>
    <p>Mot de passe : <input type="password" name="mdp" required name='mdp' /></p>
    <span class="w3-hide"><input id="idevent" type="text" name="idevent"  value='$idEvent'  required></span>
    <p><input type="submit" value="Valider" /></p>
    </form>
CHAINE_DE_FIN;
    }
    ?>

