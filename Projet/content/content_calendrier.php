<script src='js/calendrier/main.js'></script>
<?php
if (!isset($_SESSION["loggedIn"])){
    echo "<div><h2>Connectez-vous pour voir les événements</h2></div>";
}
?>

<div id='script-warning' style="display:none">
        <code>php/get-events.php</code> must be running.
    </div>
<div id='loading'>loading...</div>
<div id='calendar'></div>
<script src='lib/locales/fr.js'></script>

