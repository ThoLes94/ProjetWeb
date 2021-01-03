<?php
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=fsdhfkjl;host=127.0.0.1';
        $user = 'root';
        $password = '';
        $dbh = null;
        try {
            $dbh = new PDO($dsn, $user, $password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
            exit(0);
        }
        return $dbh;
    }

    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
        $requete = "INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`)
        VALUES ($login, SHA1($mdp),$nom,$prenom,$promotion,$naissance,$email,$feuille);";
        $sth = $dbh->prepare($requete);
        var_dump($sth);
        $sth->execute();
    }
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
        if($this->promotion==NULL){
            return "[".$this->login."]"." ".$this->prenom." <B>".$this->nom."</B>, "."né le ".explode ( "-" ,$this->naissance )[2]."/".explode ( "-" ,$this->naissance )[1]."/".explode ( "-" ,$this->naissance )[0].", "."<B>".$this->email."</B>"." <a href='base.php?hello=true'>Voir ses amis</a>";
        } else {
            return "[".$this->login."]"." ".$this->prenom." <B>".$this->nom."</B>, "."né le ".explode ( "-" ,$this->naissance )[2]."/".explode ( "-" ,$this->naissance )[1]."/".explode ( "-" ,$this->naissance )[0].", X".$this->promotion.  ", "."<B>".$this->email."</B>";
        }
    }
    public static function getUtilisateur($dbh,$login){
        $query = "SELECT * FROM `utilisateurs` WHERE `login`=$login";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
    }

    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
        $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
        if(getUtilisateur($dbh,$login) == null){
            $sth->execute(array($login,SHA1($mdp),$nom,$prenom,$promotion,$naissance,$email,$feuille));
        }
        $dbh = null; // Déconnexion de MySQL     
    }

    public static function testerMdp($dbh,$login,$mdp){
        $user=getUtilisateur($dbh,$login);
        return strcmp(SHA1($mdp), $user->mdp)== 0;
    }

    public function getAmis(){
        $dbh = Database::connect();
        $query = "SELECT `nom`,`prenom` FROM `utilisateurs` JOIN `amis` ON `login` = `login2` WHERE `login1`=$this->login";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }

    public function affiche_amis(){
        echo $this::getAmis();
    }
}
?>
