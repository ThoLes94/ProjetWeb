<?php
function printFormEvent($idEvent, $dbh)
{
    $prenom = $_SESSION['prenom'];
    $event = Event::getEvenement($dbh, $idEvent);
    echo "<div> <p> Bonjour $prenom, </p>";
    $login = $_SESSION['login'];

    echo "<p> Nous sommes ravis de voir que vous vous intéressez à cet événement, remplissez le formulaire ci-dessous pour confirmer votre inscription </p>";
    echo <<<CHAINE_DE_FIN
    <div class= "col-md-3"></div><div class= "form col-md-6 w3-card w3-round w3-padding">
    <form action="index.php?todo=inscription_cours&page=inscription_cours" method="post">
    <div class="col-md-6"><p>Evénemment : <input type="int" required name='EventTitle' value='$event->title' disabled="disabled"/></p></div>
    <div class="col-md-6"><p>Nom d'utilisateur : <input type="text"  value='$login' disabled="disabled" required name="login"/></p></div>
    <div class="row"><div class="col-md-8"><p>Adresse e-mail : <input type="email" name="email" required /></p></div>
    <div class="col-md-4 mx-auto"><p> Niveau : 
        <select style="width:100%" name="niveau" required>
            <option value=""></option>
            <option value="1">Débutant</option>
            <option value="2">Intermédiaire</option>
            <option value="3">Fort</option>
        </select>
    </p></div></div>
    <p>Mot de passe : <input type="password" name="mdp" required name='mdp' /></p>
    <span class="w3-hide"><input id="idevent" type="text" name="idevent"  value='$idEvent'  required></span>
    
    <p><input type="submit" value="Valider" class="w3-btn" style="color:blue"/></p>
    </form>
    </div><div class= "col-md-3"></div>
CHAINE_DE_FIN;
}

function printFormaddParticipant()
{
    $page = $_GET['page'];
    echo <<<CHAINE_DE_FIN
        <div class= "col-md-3"></div><div class= "form col-md-6 w3-card w3-round w3-padding">
        <form id="add" action="index.php?todo=inscription_cours&page=$page" method="post">
        <div class="row">
        <div class="col-md-6"><p>Nom d'utilisateur : <input type="text"  required name="login"/></p></div>
        <div class="col-md-6 mx-auto"><p> Niveau : 
            <select style="width:100%" name="niveau" required>
                <option value=""></option>
                <option value="1">Débutant</option>
                <option value="2">Intermédiaire</option>
                <option value="3">Fort</option>
            </select>
        </p></div>
        </div>
        <p class="w3-center row">Mot de passe : <input type="password" required name='mdp' style="width:70%" /></p>
        <span class="w3-hide"><input id="idevent" type="text" name="idevent"  required></span>
        
        <p><input type="submit" value="Valider" class="w3-btn" style="color:blue"/></p>
        </form>
        </div>

    CHAINE_DE_FIN;
}
