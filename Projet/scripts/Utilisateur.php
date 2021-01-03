<?php
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
            return "[".$this->login."] ".$this->prenom." <B>".$this->nom."</B>, né le ".explode ( "-" ,$this->naissance )[2]."/".explode ( "-" ,$this->naissance )[1]."/".explode ( "-" ,$this->naissance )[0].", <B>".$this->email."</B>, <a href='amisde.php?login=$this->login'>Voir ses amis</a>";
        } else {
            return "[".$this->login."] ".$this->prenom." <B>".$this->nom."</B>, né le ".explode ( "-" ,$this->naissance )[2]."/".explode ( "-" ,$this->naissance )[1]."/".explode ( "-" ,$this->naissance )[0].", X".$this->promotion.", <B>".$this->email."</B>, <a href='amisde.php?login=$this->login'>Voir ses amis</a>";
        }
    }
    public static function getUtilisateur($dbh,$login){
        $login="'".$login."'";
        $query = "SELECT * FROM `utilisateurs` WHERE `login`=".$login;
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
        $login="'".$this->login."'";
        $query = "SELECT * FROM `utilisateurs` JOIN `amis` ON `login` = `login2` WHERE `login1`=".$login;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $result = $sth->fetchAll();
        return $result;
    }
}
?>