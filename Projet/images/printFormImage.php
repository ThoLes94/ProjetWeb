<?php
function printFormImage(){
   echo <<<CHAINE_DE_FIN
<form action="?page=upload&todo=upload" method="post" enctype="multipart/form-data">
   <input type="file" name="fichier"/>
   <br>
   <input type="date" name="date"/>
   <p>Legende : <input type="text" name="legende"/></p>
   <input type="submit" value="envoyer" />
</form>

CHAINE_DE_FIN;

}