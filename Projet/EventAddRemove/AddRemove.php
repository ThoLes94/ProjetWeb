<?php
function addEvent($dbh)
{
    $id = bin2hex(random_bytes(12));
    if (isset($_POST['idevent']) && $_POST['idevent'] != 'test') {
        $id = $_POST['idevent'];
        $test = Event::deleteEvent($dbh, $id, TRUE);
    }
    $nom = $_POST['nom'];
    $desc = $_POST['description'];
    $start = new DateTime($_POST['jour'] . ' ' . $_POST['start']);
    $lieu = $_POST['lieu'];
    $categorie = "bonjour";
    $end = new DateTime($_POST['jour'] . ' ' . $_POST['end']);
    $event = Event::getEvenement($dbh, $id);
    while ($event != false) {
        // génération de l'id
        $id = bin2hex(random_bytes(12));
        $event = Event::getEvenement($dbh, $id);
    }
    return Database::insererEvenement($dbh, $id, $nom, $start, $end, $desc, $categorie, $lieu);
    
}


function removeEvent($dbh)
{
    if (!isset($_POST['idevent'])) {
        return false;
    }
    $id = $_POST['idevent'];
    return Event::deleteEvent($dbh, $id, FALSE);
}
