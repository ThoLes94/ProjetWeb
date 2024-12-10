<script src='js/calendrier/mainAdmin.js'></script>
<?php
if (!isset($_SESSION["loggedIn"]) && !isset($_SESSION["isAdmin"])) {
    echo "<div><h2>Vous devez être un admin pour pouvoir rajouter des événements!</h2></div>";
    return;
}

if (!isset($_SESSION["loggedIn"])) {
    echo "<div><h2>Connectez-vous pour voir les événements</h2></div>";
    return;
}



$query = "SELECT * FROM `evenements` order by  'start', 'end'";
$sth = $dbh->prepare($query);
$sth->setFetchMode();
$sth->execute();
$array1 = array();
while ($toto = $sth->fetch()) {
    $array1[] = $toto;
}
$json1 = json_encode($array1);
$bytes = file_put_contents("json/myfile.json", $json1);
?>

<div style="z-index: 2;">
    <div id='calendar'></div>
</div>

<script src='js/calendrier/mainAdmin.js'></script>
<script src='lib/locales/fr.js'></script>

<div class="callout w3-hide mx-auto my-auto w3-round w3-card" id="descrip">
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
                <p>Heure de début : <input id="formstart" type="start" name="start" required /></p>
            </div>
            <div class="col-sm-6">
                <p>Heure de fin : <input id="formend" type="end" name="end" required /></p>
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
</div>

<div id='script-warning' style="display:none">
    <code>php/get-events.php</code> must be running.
</div>
<div id='loading'>loading...</div>