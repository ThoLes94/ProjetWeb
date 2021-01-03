<!DOCTYPE html>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Base De Données</h1>
        </div>
        <div class="container">
            <?php
                require "scripts/Database.php";
                require "scripts/Utilisateur.php";
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
    </div>
</body>
