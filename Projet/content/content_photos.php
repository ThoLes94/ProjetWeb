<h2>Découvrez les photos des derniers événements</h2>
<h3>Merci au binet Photo pour leur couverture</h3>


<?php
$query = "SELECT * FROM `images` ORDER BY `date` AND `id` ";
$sth = $dbh->prepare($query);
$sth->setFetchMode();
$sth->execute();
$array1 =$sth->fetchall();
// echo var_dump($array1);
foreach ($array1 as $i){
    $id=$i[0];
    $data = $i[1];
    $date = $i[2];
    $src ="images/actis/activite-photo-".$id.".jpg";
    // echo $src;
    echo "<a href=$src data-lightbox='show-1' data-title=$data><img src=$src alt=$data width='20%'></a>";
}

    ?>
