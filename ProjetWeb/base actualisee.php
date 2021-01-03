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

    class Utilisateur {
        public $login;
        public $mdp;
        public $nom;
        public $prenom;
        public $promotion;
        public $naissance;
        public $email;
        public $feuille;
     
        public function __toString() {
            if($this->promotion=='NULL'){
                return $this->login.' '.$this->prenom.' '.$this->nom.', né le '.$this->naissance.', '.$this->email;
            }
            else{
                return $this->login.' '.$this->prenom.' '.$this->nom.', né le '.$this->naissance.' '.', X'.$this->promotion.', '.$this->email;
            } 
        }

        public static function getUtilisateur($dbh,$login){
            $dbh = Database::connect();
            $query = "SELECT * FROM `utilisateurs` WHERE `login`=$login";
            $sth = $dbh->prepare($query);
            $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
            $sth->execute();
            $user = $sth->fetch();
            $sth->closeCursor();
            echo $user.__toString();
        }

        public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
            $dbh = Database::connect();
            $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
            if(getUtilisateur($dbh,$login) == null){
                $sth->execute(array($login,SHA1($mdp),$nom,$prenom,$promotion,$naissance,$email,$feuille));
            }
            $dbh = null; // Déconnexion de MySQL     
        }

        public static function testerMdp($dbh,$login,$mdp){

        }

        public function getAmis($login){
            $dbh = Database::connect();
            $query = "SELECT `nom`,`prenom` FROM `utilisateurs` JOIN `amis` ON `login` = `login2` WHERE `login1`=$login";
            $sth = $dbh->prepare($query);
            $sth->execute();
            $result = $sth->fetchAll();
        }

    }

?>
        </div>
    </body>
</html>