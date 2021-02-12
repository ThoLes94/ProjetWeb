<script src='js/calendrier/mainAdmin.js'></script>
<?php
if (!isset($_SESSION["loggedIn"]) && !isset($_SESSION["isAdmin"])){
    echo "<div><h2>Vous devez être un admin pour pouvoir rajouter des événements!</h2></div>";
    return ;
}

if (!isset($_SESSION["loggedIn"])){
    echo "<div><h2>Connectez-vous pour voir les événements</h2></div>";
}
?>
<div id='loading'>loading...</div>
<div id='calendar'></div>
<script src='../lib/locales/fr.js'></script>