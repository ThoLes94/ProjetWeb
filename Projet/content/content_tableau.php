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
                        <th></th>
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
                        <th></th>
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






<div class="w3-center">
    <a class="w3-button w3-card w3-round" href="?page=calendrier"> Calendrier</a>
</div>
<script src="js/admin.js"></script>
<script src="js/datatables.filters.js"></script>