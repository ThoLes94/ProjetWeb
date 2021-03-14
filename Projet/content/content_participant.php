<?php
if (!isset($_SESSION['login'])) {
    echo '<h2> Connectez vous pour voir les participants aux activités.</h2>';
    return;
}
if (!isset($_SESSION['isAdmin'])) {
    echo "<h2> Vous devez être admin pour voir les participants aux activités.</h2>";
    return;
}

$login = $_SESSION["login"];

if (isset($_GET["todo"]) && $_GET["todo"] == "inscription_cours") {
    addParticipant($dbh, $login);
}

echo <<<CHAINE
<div>
    <select id="select" name="id"> 

CHAINE;
$input_arrays = Event::getAllEvenementCall($dbh);

for ($i = 0; $i < count($input_arrays); ++$i) {
    $id = $input_arrays[$i]['id'];
    $event = Event::getEvenement($dbh, $id);
    $select = '';
    if (isset($_GET['id']) && $_GET['id'] == $id) {
        $select = ' selected="selected"';
    }
    echo "<option value=$id $select label=\"$event\"></option>";
} ?>
</select> </div>
<div>
    <div class="demo-html">
        <div>
            <table class="display table table-striped table-bordered" id="example" style="max-width:100% ; ">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Niveau</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th><input type=submit value="Ajouter un participant" style="color:green" class="w3-btn" onclick="remplir()"></th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Niveau</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<div id="ajout" class="w3-hide">
    <?php
    printFormaddParticipant()
    ?>
</div>


    <div class="w3-center">
        <a class="w3-button w3-card w3-round" href="?page=calendrier"> Calendrier</a>
    </div>
    <script src="js/participantsAdmin.js"></script>
    <script src="js/datatables.filters.js"></script>