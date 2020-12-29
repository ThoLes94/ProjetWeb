<html>
    <head>
        <title> Modal Web </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Mon CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <h1>Base De Données</h1>
            </div>
        
    


 
 <?php
    require "Projet/scripts/Database.php";
// opérations sur la base
    $dbh = Database::connect();
    var_dump($dbh);
    $requete = "SELECT * FROM `utilisateurs` order by nom, prenom";
    $sth = $dbh->prepare($requete);
    var_dump($sth);
    $sth->execute();
    echo $sth->rowCount();
    while($toto = $sth->fetch(PDO::FETCH_ASSOC)){
        echo $toto['prenom'].'<br>';
    }
?>
        </div>
    </body>
</html>