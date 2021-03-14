<?php
if (!isset($_SESSION['loggedIn']) || !isset($_SESSION['isAdmin'])) {
    echo "Page non autorisée";
    return;
}
?>

<div>
    <div class="demo-html">
        <div>
            <table class="display table table-striped table-bordered" id="example" style="max-width:100% ">
                <thead>
                    <tr>
                        <th>Nom de l'événement</th>
                        <th>Date</th>
                        <th>Heure de début</th>
                        <th>Heure de fin</th>
                        <th>Lieu</th>
                        <th>Nombre de personnes inscrites</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom de l'événement</th>
                        <th>Date</th>
                        <th>Heure de début</th>
                        <th>Heure de fin</th>
                        <th>Lieu</th>
                        <th>Nombre de personnes inscrites</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>

<div class="col-md-3"></div>
<div id="ajout" class="w3-hide col-md-6">
    <?php
    printFormEventAdmin()
    ?>
</div>


<div class="justify-content-center">
<div><a type=submit value="Ajouter un évenement" style="color:green" class="w3-btn w3-card w3-round w3-margin" onclick="remplir()">Ajouter un évenement</a><a  class="w3-button w3-card w3-round" href="?page=calendrier">Accéder au Calendrier</a></div>
</div>
<script src="js/admin.js"></script>
<!-- <script src="js/datatables.filters.js"></script> -->