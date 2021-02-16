<script src='js/calendrier/main.js'></script>
<div id='script-warning' style="display:none">
        <code>php/get-events.php</code> must be running.
    </div>
<div id='loading'>loading...</div>
<div id='calendar'></div>
<script src='lib/locales/fr.js'></script>


<div class="callout w3-hide mx-auto my-auto w3-round" id="descrip">
    <div class="callout-header" id="test">
        <p> Evénement : <span id="nom"></span></p>
    </div>
    <span class="closebtn" onclick="descrip_a()">×</span>
    <div class="callout-container form">
        <form action="index.php?todo=registerEvent&page=calendrier" method="post">
            <p>Nom de l'événement : <input id="formnom" type="text" name="nom" value="" required disabled="disabled"/></p>
            <p>Description de l'événement : <input id="formdesc" type="text" name="description" required disabled="disabled"/></p>
            <p>Jour de l'événement : <input id="formdate" type="date" name="jour" required disabled="disabled"/></p>
            <div class="col-sm-6">
                <p>Heure de début : <input id="formstart" type="start" name="start" required disabled="disabled"/></p>
            </div>
            <div class="col-sm-6">
                <p>Heure de fin : <input id="formend" type="end" name="end" disabled="disabled"/></p>
            </div>
            <p> Lieu : <input id="lieu" type="text" name="lieu" disabled="disabled"> </p>
            <p><input id="banane" type="text" name="idevent2"></p>
            <input type=submit value="S'inscire" style="background-color:#3788D8">
        </form>
    </div>
</div>