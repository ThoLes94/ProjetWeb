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
    require "scripts/Database.php";
    require "scripts/Utilisateur.php";
    require('utilities/utils.php');
// opérations sur la base
    $dbh = Database::connect();
    $query = "SELECT * FROM `utilisateurs` order by nom, prenom";
    $sth = $dbh->prepare($query);
    $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
    $sth->execute();
    while($toto = $sth->fetch()){
        echo $toto.'<br>';
    }
?>
        </div>
    </body>
</html>