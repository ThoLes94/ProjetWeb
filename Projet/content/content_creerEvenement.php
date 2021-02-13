<?php
if (!isset($_SESSION["loggedIn"]) && !isset($_SESSION["isAdmin"])) {
    echo "<div><h2>Vous devez être un admin pour pouvoir rajouter des événements!</h2></div>";
    return;
}

if (!isset($_SESSION["loggedIn"])) {
    echo "<div><h2>Connectez-vous pour voir les événements</h2></div>";
}
?>
<div id='loading'>loading...</div>
<div id='calendar'></div>

<div class="callout w3-hide mx-auto my-auto w3-round" id="descrip">
    <div class="callout-header" id="test">
        <p> Evénement : <span id="nom"></span></p>
    </div>
    <span class="closebtn" onclick="descrip_a()">×</span>
    <div class="callout-container form">
        <form action="index.php?todo=addEvent&page=creerEvenement" method="post" oninput="up2.setCustomValidity(up2.value != up.value ? 'Les mots de passe diffèrent.' : '')">
            <p>Nom de l'événement : <input id="formnom" type="text" name="nom" value="" required /></p>
            <p>Description de l'événement : <input id="formdesc" type="text" name="description"  required /></p>
            <p>Jour de l'événement : <input id="formdate" type="date" name="jour"  required /></p>
            <div class="col-sm-6"><p>Heure de début : <input id="formstart" type="time" name="start" required /></p> </div>
            <div class="col-sm-6"><p>Heure de fin : <input id="formend" type="time" name="end"  /></p></div>
            <input type=submit value="Sauvegarder">
        </form>
    </div>
</div>
<script src='js/calendrier/mainAdmin.js'></script>
<script src='lib/locales/fr.js'></script>