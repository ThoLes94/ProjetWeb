<?php
<<<<<<< HEAD
    class evenement{
        public $id;
        public $nom;
        public $categorie;
        public $dateDebut;
        public $dateFin;
        public $allday;
        public $lieu;
    

    function __toString() {
        return "L'événement ".$this->id." : ".$this->nom." de type ".$this->categorie." a lieu le ".explode ( "-" ,$this->date )[2]."/".explode ( "-" ,$this->date )[1]."/".explode ( "-" ,$this->date )[0]." à ".$this->heure." , ".$this->lieu." et durera ".$this->duree." minutes.";
    }


    public static function getEvenement($dbh,$id){
        $id="'".$id."'";
        $query = "SELECT * FROM `evenements` WHERE `id`=".$id;
=======
class evenement
{
    public $id;
    public $nom;
    public $categorie;
    public $date;
    public $heure;
    public $duree;
    public $lieu;

    public function __toString()
    {
        return "L'événement " . $this->id . " : " . $this->nom . " de type " . $this->categorie . " a lieu le " . explode("-", $this->date)[2] . "/" . explode("-", $this->date)[1] . "/" . explode("-", $this->date)[0] . " à " . $this->heure . " , " . $this->lieu . " et durera " . $this->duree . " minutes.";
    }

    public static function getEvenement($dbh, $id)
    {
        $query = "SELECT * FROM `utilisateurs` WHERE `id`=?";
>>>>>>> e507b20f73e386f6915e355adc51bb27dc127672
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Evenement');
        $sth->execute(array($id));
        $event = $sth->fetch();
        $sth->closeCursor();
        return $event;
    }
}


<<<<<<< HEAD
    function insererEvenement($dbh,$id,$nom,$categorie,$date,$heure,$duree,$lieu){
        $sth = $dbh->prepare("INSERT INTO `evenement` (`id`, `nom`, `categorie`, `date`, `heure`, `duree`, `lieu`) VALUES(?,?,?,?,?,?,?)");
        if (Evenement::getEvenement($dbh,$id)==null){
            $sth->execute(array($id,$nom,$categorie,$date,$heure,$duree,$lieu));
        }   
    }




        
    
=======
    public function insererEvenement($dbh, $id, $nom, $categorie, $date, $heure, $duree, $lieu)
    {
        $sth = $dbh->prepare("INSERT INTO `evenement` (`id`, `nom`, `categorie`, `date`, `heure`, `duree`, `lieu`) VALUES(?,?,?,?,?,?,?)");
        if (evenement::getEvenement($dbh, $id) == null) {
            $sth->execute(array($id, $nom, $categorie, $date, $heure, $duree, $lieu));
        }
    }
}
>>>>>>> e507b20f73e386f6915e355adc51bb27dc127672
