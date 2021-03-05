<?php
if (!isset($_SESSION['loggedIn'])) {
  exit();
}

?>

<script src='js/calendrier/mainAdmin.js'></script>

<div style="z-index: 2;">
    <div id='calendar'></div>
</div>

<script src='js/calendrier/mainAdmin.js'></script>
<script src='lib/locales/fr.js'></script>

<div class="callout w3-hide mx-auto my-auto w3-round w3-card" id="descrip">
    <?php printFormEventAdmin();?>
</div>

<div id='script-warning' style="display:none">
    <code>php/get-events.php</code> must be running.
</div>
<div id='loading'>loading...</div>