<div class="container">
    <div class="jumbotron">
        <h1>Base De Données</h1>
    </div>
    <div class="container">
        <?php
            if (!isset($_SESSION['loggedIn'])) {
                echo "Page non autorisée";
                return;
            }
            $query = "SELECT * FROM `utilisateurs` order by nom, prenom";
            $sth = $dbh->prepare($query);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->execute();
            while($toto = $sth->fetch()){
                echo '<p>'.$toto.'<br>'.'</p>'. PHP_EOL;
            }
        ?>
    </div>
</div>
