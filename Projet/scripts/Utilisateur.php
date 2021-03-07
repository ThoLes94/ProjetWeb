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
    public $isAdmin;
 
    public function __toString() {
        if($this->promotion==NULL){
            $promotion='';
        } else {
            $promotion= " X".$this->promotion.", ";
        }
        return "[".$this->login."] ".$this->prenom." <B>".$this->nom."</B>, né le ".explode ( "-" ,$this->naissance )[2]."/".explode ( "-" ,$this->naissance )[1]."/".explode ( "-" ,$this->naissance )[0].", ".$promotion." <B>".$this->email."</B>, <a href='index.php?page=amisde&login=$this->login'>Voir ses amis</a>";
    }
    public static function getUtilisateur($dbh,$login){
        $query = "SELECT * FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
    }

    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
        $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`, `isAdmin`) VALUES(?,SHA1(?),?,?,?,?,?,?,?)");
        if(Utilisateur::getUtilisateur($dbh,$login) == null){
            $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille,NULL));
            return true;
        }
        return false;
    }

    public static function testerMdp($dbh,$user,$mdp){
        return strcmp(SHA1($mdp), $user->mdp)== 0;
    }

    public function getAmis($dbh){
        $login=$this->login;
        $query = "SELECT * FROM `utilisateurs` JOIN `amis` ON `login` = `login2` WHERE `login1`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute(array($login));
        $result = $sth->fetchAll();
        return $result;
    }
    
    public static function changePassword($dbh,$login,$newmdp){
        $mdp=SHA1($newmdp);
        $query="UPDATE `utilisateurs` SET `mdp`=? WHERE `login`=?";
        $sth = $dbh->prepare($query);
        if(Utilisateur::getUtilisateur($dbh,$login) != null){
            $sth->execute(array($mdp,$login));
            return true;
        }
        return false;
    }

    public static function deleteUser($dbh,$login){
        $query="DELETE FROM `utilisateurs` WHERE `login`=?";
        $sth = $dbh->prepare($query);
        if(Utilisateur::getUtilisateur($dbh,$login) != null){
            $sth->execute(array($login));
        } else return false;
        $query="DELETE FROM `inscription` WHERE `id_eleve`=?";
        $sth = $dbh->prepare($query);
        $sth->execute(array($login));
        return true;        
    }

    public static function isAdmin($dbh, $login){
        $user = Utilisateur::getUtilisateur($dbh,$login);
        return $user->isAdmin==1;
    }

    public static function iscrit($dbh, $login){
        $query = "SELECT id_event FROM `inscription`  WHERE `id_eleve`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode();
        $sth->execute(array($login));
        $result = $sth->fetchAll();
        return $result;
    }

    public static function estInscrit($dbh, $login, $id_event){
        $result = Utilisateur::iscrit($dbh, $login);
        foreach( $result as $event){
            if ($event['id_event']==$id_event){
                return true;
            }
        }
        return FALSE;
    }
}
?>