<?php
if (!isset($_SESSION['loggedIn'])) {
  exit();
}
?>
<script src='js/calendrier/main.js'></script>
<div id='script-warning' style="display:none">
    <code>php/get-events.php</code> must be running.
</div>
<div id='loading'>loading...</div>
<div id='calendar' style="max-height:100%"></div>
<script src='lib/locales/fr.js'></script>


<div class="callout w3-hide mx-auto my-auto w3-round w3-card" style="max-width:60%" id="descrip">
    <?php printFormEventnormal();?>
</div>