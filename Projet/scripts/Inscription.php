<?php
    class inscription{
        public $id_evenement;
        public $id_eleve;

    }
    public static function getInscription($dbh,$id_evenement,$id_eleve){
        $id_evenement="'".$id_evenement."'";
        $id_eleve="'".$id_eleve."'";
        $query = "SELECT * FROM `inscription` WHERE `id_evenement`=$id_evenement AND `id_eleve`=$id_eleve"  ;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Inscription');
        $sth->execute();
        $inscription = $sth->fetch();
        $sth->closeCursor();
        return $inscription;
    }

    public function insererInscription($id_evenement,$id_eleve){
        $sth = $dbh->prepare("INSERT INTO `inscription` (`id_evenement`, `id_eleve`) VALUES(?,?)");
        if(getInscription()==null){
            $sth->execute(array($id_evenement,$id_eleve));
            return true;
        }
        return false;
    }