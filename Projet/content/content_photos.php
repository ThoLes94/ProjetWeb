<link href="css/photos.css" rel="stylesheet">
<h2>Découvrez les photos des derniers événements</h2>
<h3>Merci au binet Photo pour leur couverture</h3>


<?php

$query = "SELECT * FROM `images` ORDER BY `date` AND `id` ";
$sth = $dbh->prepare($query);
$sth->setFetchMode();
$sth->execute();
$array1 = $sth->fetchall();
// echo var_dump($array1);
if (!isset($_SESSION['isAdmin'])) {
echo '<div class="galerie"><ul>';
    foreach ($array1 as $i) {
        $id = $i[0];
        $data = $i[1];
        $date = $i[2];
        $src = "images/actis/activite-photo-" . $id . ".jpg";
        // echo $src;
        echo <<<CHAINE_DE_FIN
        <li>
            <a href=$src data-lightbox='show-1' data-title=$data><img src=$src alt=$id style="width=20%"></a>
        </li>
CHAINE_DE_FIN;
    }
    echo "</ul></div>";
} else {
    echo "<div class='row'>";
    echo "<div class='w3-center col-md-6 '><a onclick='select()' class='w3-btn w3-card w3-round'>Sélectionner les images à supprimer</a></div>";
    echo "<div class='w3-center  col-md-6 '><a href='?page=upload' class='w3-btn w3-card w3-round'>Ajouter des photos</a></div></div>";
    echo "<div id='galerie' class='galerie w3-margin'>";
    echo "<ul>";
    foreach ($array1 as $i) {
        $id = $i[0];
        $data = $i[1];
        $date = $i[2];
        $src = "images/actis/activite-photo-" . $id . ".jpg";
        // echo $src;
        echo <<<CHAINE_DE_FIN
        <li>
            <a href=$src data-lightbox='show-1' data-title=$data><img src=$src alt=$id></a>
        </li>
CHAINE_DE_FIN;
    } echo "</ul></div>";

    echo "<div id='select'  class='w3-hide'><form action=\"index.php?todo=removePhoto&page=photos\" method='post'><div class='galerie'>";
    echo "<select multiple=\"multiple\" class=\"image-picker galerie\" name=\"select[]\">";  
    foreach ($array1 as $i) {
        $id = $i[0];
        $data = $i[1];
        $date = $i[2];
        $src = "images/actis/activite-photo-" . $id . ".jpg";
        // echo $src;
        echo <<<CHAINE_DE_FIN
            <option data-img-src=$src name="test" value=$id>$id</option>
        
CHAINE_DE_FIN;
    }
    echo "</select></div><div class=\"row w3-center\"><p><input class=\"w3-btn w3-card w3-round\" type=\"submit\" onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ces photos?');\" value=\"Supprimer\"/></p></div></form></div>";
}
$params = [
    'index' => 'my_index',
    'id'    => 'my_id'
];

// Delete doc at /my_index/_doc_/my_id

?>

<script src='js/image-picker.js'></script>
<script src='js/photos.js'></script>

