<?php
class Database {
    public static function connect() {
        $dsn = 'mysql:dbname=base_projet;host=127.0.0.1';
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
        VALUES (?, SHA1(?),?,?,?,?,?,?);";
        $sth = $dbh->prepare($requete);
        var_dump($sth);
        $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
    }

    public static function inscriptionUtilisateur($dbh, $login, $idEvent, $niveau){
        $requete = "INSERT INTO `inscription` (`id_eleve`, `id_event`, `niveau`)
        VALUES (?,?,?);";
        $sth = $dbh->prepare($requete);
        $sth->execute(array($login,$idEvent,$niveau));
        return true;
    }
}
?>
