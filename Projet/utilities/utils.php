<?php
   $page_list = array(
      array(
         "name"=>"welcome",
         "title"=>"Accueil de notre site",
         "menutitle"=>"Accueil"),
      array(
         "name"=>"contacts",
         "title"=>"Qui sommes-nous ?",
         "menutitle"=>"Nous contacter"),
      array(
         "name"=>"inscription",
         "title"=>"Inscription sur le site",
         "menutitle"=>"S'inscrire"),

      array(
         "name"=>"inscription_cours",
         "title"=>"Inscription aux différents événements",
         "menutitle"=>"Evénements"),
      array(
         "name"=>"actualites",
         "title"=>"Actualités du binet",
         "menutitle"=>"Actualités"),
      array(
         "name"=>"photos",
         "title"=>"Photos des derniers événements",
         "menutitle"=>"galerie"),
      array(
         "name"=>"ajouter_evenement",
         "title"=>"Ajouter un nouvel événement",
         "menutitle"=>"Nouvel événement"),
      array(
         "name"=>"base",
         "title"=>"Liste de tous les utilisateurs",
         "menutitle"=>""),
      array(
         "name"=>"amisde",
         "title"=>"Amis de ",
         "menutitle"=>""),
      array(
         "name"=>"tableau",
         "title"=>"Amis de ",
         "menutitle"=>""),
      array(
         "name"=>"changePassword",
         "title"=>"Mon compte",
         "menutitle"=>""),
      array(
         "name"=>"calendrier",
         "title"=>"Nos événements",
         "menutitle"=>""),
      array(
         "name"=>"deleteUser",
         "title"=>"Se désinscrire",
         "menutitle"=>"")
      );
   function generateHTMLHeader($titre_page, $chemin){
      echo <<<CHAINE_DE_FIN
<!DOCTYPE html>
<html lang="fr">
   <head>
      <link href=$chemin rel="stylesheet">
      <link href= "css/w3.css" rel="stylesheet">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="Victor Mongay et Thomas Lespargot" content="Nom de l'auteur"/>
      <meta name="keywords" content="Mots clefs relatifs à cette page"/>
      <meta name="description" content="Descriptif court"/>
      <title>$titre_page</title>
      <style>
         table{
            border:1px solid  black !important;
         }
         td{
            border:1px solid  black !important;
         }
      </style>
      <link href='lib/main.css' rel='stylesheet' />
      <script src='lib/main.js'></script>
   </head>

   <body>
CHAINE_DE_FIN;
   }

      
   function generateHTMLFooter(){
         echo <<<CHAINE_DE_FIN
   </body>
</html>
CHAINE_DE_FIN;
      }
      
   
   function checkPage($askedPage){
      $authorized = false;
      global $page_list;
      foreach($page_list as $page){
         if($askedPage == $page['name']){
            $authorized = true;
      }
      }   
      return $authorized;
   }

   function getPageTitle($askedPage){
      global $page_list;
      foreach($page_list as $page){
         if($askedPage == $page['name']){
            return($page['title']);
         }
      }
   }

   function generateMenu(){
      if (isset($_GET["page"])) $page=$_GET["page"];
      else $page="welcome";
      echo <<<CHAINE_DE_FIN
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="#">STYL'X</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=welcome">Accueil <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=actualites">Actualités</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=inscription_cours">Ateliers couture</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=photos">Galerie</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=contacts">Contact</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link" href="index.php?page=base">Base de données</a>
            </li>
         </ul>
CHAINE_DE_FIN;
         if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false){
            echo <<<CHAINE_DE_FIN
         <ul class="nav navbar-nav navbar-right">
            <li> 
               <form action="index.php?todo=login&page=$page" method='post'>
                  <p style = "padding-top: 10px; padding-bottom: 10px" >
                     <input type="text" name="login" placeholder="login" required />
                     <input type="password" name="mdp" placeholder="mot de passe" required />
                     <input type="submit" value="Valider" />
                  </p>
               </form>
            </li>
            <li><a href="index.php?page=inscription"><span class="glyphicon glyphicon-user"></span> S'inscrire</a></li>
            
         </ul>
      </div>
   </div>
</nav>
CHAINE_DE_FIN;   }
         else {
            echo <<<CHAINE_DE_FIN
         <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?page=changePassword"><span class="glyphicon glyphicon-user"></span> Mon compte </a></li>
            <li><a href="index.php?page=$page&todo=logout"><span class="glyphicon glyphicon-log-in"></span> Se Déconnecter</a></li>
         </ul>
      </div>
   </div>
</nav>

CHAINE_DE_FIN;
         }
   }
?>