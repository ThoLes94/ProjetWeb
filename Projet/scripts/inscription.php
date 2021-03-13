<?php
class Inscription
{
    public $id_eleve;
    public $id_event;

    public static function getInscription($dbh, $id_eleve, $id_event)
    {
        $query = "SELECT * FROM `inscription` WHERE `id_eleve`=? AND `id_event`=?";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Inscription');
        $sth->execute(array($id_eleve, $id_event));
        $inscription = $sth->fetch();
        $sth->closeCursor();
        return $inscription;
    }

    public static function removeInscription($dbh, $id_eleve, $id_event)
    {
        $query = "DELETE FROM `inscription` WHERE `id_eleve`=? AND `id_event`=?";
        $sth = $dbh->prepare($query);
        if (Inscription::getInscription($dbh, $id_eleve, $id_event) != null) {
            $sth->execute(array($id_eleve, $id_event));
            $sth->closeCursor();
            return true;
        } else return false;
    }
}
