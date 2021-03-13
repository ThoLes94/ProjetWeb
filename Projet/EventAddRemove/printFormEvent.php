<?php
function printFormEventAdmin(){
    echo <<<CHAINE_DE_FIN
    <div class="callout-header" id="test">
        <p> Evénement : <span id="nom"></span></p>
    </div>
    <span class="closebtn" onclick="descrip_a()">×</span>
    <div class="callout-container form w3-card w3-round">
        <form action="index.php?todo=addEvent&page=calendrier" method="post">
            <p>Nom de l'événement : <input id="formnom" type="text" name="nom" value="" required /></p>
            <p>Description de l'événement : <input id="formdesc" type="text" name="description" required /></p>
            <p>Jour de l'événement : <input id="formdate" type="date" name="jour" class="hasDatepicker" required /></p>
            <div class="col-sm-6">
                <p>Heure de début : <input id="formstart" type="time" name="start" required /></p>
            </div>
            <div class="col-sm-6">
                <p>Heure de fin : <input id="formend" type="time" name="end" required /></p>
            </div>
            <p> Lieu : <input id="lieu" type="text" name="lieu" required> </p>
            <p><input id="banane" type="text" name="idevent" required></p>
            <input type=submit value="Sauvegarder">
        </form>
        <div id="suppr" class="w3-hide">
            <form action="index.php?todo=removeEvent&page=calendrier" method="post">
                <span class="w3-hide"><input id="idevent" type="text" name="idevent" required></span>
                <input type=submit value="Supprimer" style="color:red">
            </form>
        </div>
    </div>

CHAINE_DE_FIN;
}

function printFormEventnormal(){
    echo <<<CHAINE
    <div class="callout-header" id="test">
        <p> Evénement : <span id="nom"></span></p>
    </div>
    <span class="closebtn" onclick="descrip_a()">×</span>
    <div class="callout-container form  w3-card w3-round">
        <form action="index.php?page=inscription_cours" method="post">
            <p class="w3-hide">Nom de l'événement : <input id="formnom" type="text" name="nom" value="" required disabled="disabled" /></p>
            <p>Description de l'événement : <input id="formdesc" type="text" name="description" required disabled="disabled" /></p>
            <div class="col-md-6"><p> Lieu : <input id="lieu" type="text" name="lieu" disabled="disabled"> </p></div>
            <div class="col-md-6"><p>Jour de l'événement : <input id="formdate" type="date" name="jour" required disabled="disabled" /></p></div>
            <div class="col-sm-6">
                <p>Heure de début : <input id="formstart" type="time" name="start" required disabled="disabled" /></p>
            </div>
            <div class="col-sm-6">
                <p>Heure de fin : <input id="formend" type="time" name="end" disabled="disabled" /></p>
            </div>
            <p><input id="banane" type="text" name="idevent"></p>
            <input type=submit value="S'inscire" style="background-color:#3788D8">
        </form>
    </div>
CHAINE;
}