<?php
    class image{
        public $id;
        public $legende;
        public $date;

    public static function getImage($dbh,$id){
        $id="'".$id."'";
        $query = "SELECT * FROM `images` WHERE `id`=".$id;
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Image');
        $sth->execute(array($id));
        $image = $sth->fetch();
        $sth->closeCursor();
        return $image;
    }



    public static function insererImage($dbh,$id,$legende,$date){
        $sth = $dbh->prepare("INSERT INTO `images` (`id`, `legende`, `date`) VALUES(?,?,?)");
        if (Image::getImage($dbh,$id)==null){
            $sth->execute(array($id,$legende,$date));
            return true;
        }   
        return false;
    }

    public static function compterImages($dbh){
        $query  = "SELECT COUNT(*) FROM `images`";
        $sth = $dbh->prepare($query);
        $sth->execute();
        $count =(int) $sth->fetch()[0];
        // echo var_dump($count);
        return $count;
        // return $sth;
    }
    }