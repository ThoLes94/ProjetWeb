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
               "title"=>"Inscritption à nos événements",
               "menutitle"=>"S'inscrire"),
            );
        function generateHTMLHeader($titre_page, $chemin){
            echo <<<CHAINE_DE_FIN
              <!DOCTYPE html>
              <html>
 
                <head>
                   <link href=$chemin rel="stylesheet">
                   <!-- Bootstrap CSS -->
                   <link href="css/bootstrap.min.css" rel="stylesheet">

                   <meta charset="UTF-8"/>
                   <meta name="author" content="Nom de l'auteur"/>
                   <meta name="keywords" content="Mots clefs relatifs à cette page"/>
                   <meta name="description" content="Descriptif court"/>
                   <title>$titre_page</title>

                  <style typ=text/css>
                     table{
                        border:1px solid  black !important;
                     }
                     td{
                        border:1px solid  black !important;
                     }
                        
                        }
                  </style>
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
           echo <<<CHAINE_DE_FIN
               <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
         
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=welcome">Accueil <span class="sr-only">(current)</span></a>
                           </li>
                           <li class="nav-item">
                                 <a class="nav-link" href="#">Informations pratiques</a>
                           </li>
                           <li class="nav-item">
                                 <a class="nav-link" href="index.php?page=contacts">Contact</a>
                           </li>
                        </ul>
                     </div>
               </nav>
   CHAINE_DE_FIN;    
   
        }
       

?>