<?php
    class inscription{
        public $id_evenement;
        public $id_eleve;
    }
    
    function getInscription($dbh,$id_evenement,$id_eleve){
        //$id_evenement="'".$id_evenement."'";
       // $id_eleve="'".$id_eleve"'";
        $query = "SELECT * FROM `inscription` WHERE `id_event`=? AND `id_eleve`=?"  ;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Inscription');
        $sth->execute(array($id_evenement,$id_eleve));
        $inscription = $sth->fetch();
        $sth->closeCursor();
        return $inscription;
    }

    function insererInscription($id_evenement,$id_eleve,$dbh){
        $sth = $dbh->prepare("INSERT INTO `inscription` (`id_event`, `id_eleve`) VALUES(?,?)");
        if(getInscription($dbh,$id_evenement,$id_eleve)==null){
            $sth->execute(array($id_evenement,$id_eleve));
            return true;
        }
        return false;
    }