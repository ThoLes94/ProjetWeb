<!DOCTYPE html>
<html>
    <head>
        <title>Modal Web</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Mon CSS Perso -->
        <link href="css/perso.css" rel="stylesheet">
    </head>
    <body>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#"> Modal Web </a> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Informations pratiques</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Langages
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="dropdown-header">Basiques</div>
                                <a class="dropdown-item" href="#">HTML5</a>
                                <a class="dropdown-item" href="#">CSS</a>
                                <a class="dropdown-item" href="#">PHP</a>
                                <a class="dropdown-item" href="#">SQL</a>
                                <a class="dropdown-item" href="#">Javascript</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Avancé</div>
                                <a class="dropdown-item" href="#">Ajax</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Texte">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
                    </form>
                </div>
            </nav>
            <div class="jumbotron">
                <h1 class="display-3 text-right">Bienvenue en modal web!</h1>
                <hr class="my-3">
                <p class=" text-right">Dans ce cours vous apprendrez à faire des sites webs à la pointe de la modernité.</p>
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 equipe">
                    <h2>Notre équipe:</h2>
                    <div class="row">
                        <div class="col-md-2 offset-md-2">
                            <img class="rounded-circle img-fluid" src="img/serre.jpg" alt="Olivier Serre">
                            <h3>Olivier Serre</h3>
                            <p>Olivier se charge des amphis de la période 4. Il sera également présent en salle machine pour certaines séances de TD.</p>
                            <p><a class="btn btn-secondary" href="http://www.liafa.univ-paris-diderot.fr/~serre" role="button">En savoir plus »</a></p>
                        </div>
                        <div class="col-md-2 offset-md-1">
                            <img class="rounded img-fluid" src="img/rossin.jpg" alt="Dominique Rossin">
                            <h3>Dominique Rossin</h3>
                            <p>Dominique est le gourou historique du modal web. Depuis quelques années il s'est tourné vers les tablettes mais vous aurez cependant la chance de le voir parfois en amphi et en TD.</p>
                            <p><a class="btn btn-success" href="#" role="button">En savoir plus »</a></p>
                        </div>
                        <div class="col-md-2 offset-md-1">
                            <img class="rounded-circle img-fluid" src="img/avatar.jpg" alt="femme">
                            <h3>Collègue mystère</h3>
                            <p>Une collègue mystère.</p>
                            <p><a class="btn btn-danger" href="#" role="button">En savoir plus »</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="temoignage">
                <div class="row">
                    <div class="col-md-5 offset-md-1">
                        <blockquote class="blockquote lignegauche">
                            <p>Le modal web m'a permis de m'épanouir et de développer ma propre start-up. Aujourd'hui je suis riche et j'ai plein d'amis.</p>
                            <footer class="blockquote-footer">Mark Z., developper
                            </footer>
                        </blockquote>
                    </div>
                    <div class="col-md-5">
                        <blockquote class="blockquote lignegauche">
                            <p>Le modal web m'avait l'air cool. J'ai par contre séché la plupart des amphis et aussi les TD car je suis adepte des longs week-ends de printemps. Depuis j'ai été orangisé…</p>
                            <footer class="blockquote-footer">Anonyme, X2012
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="cours">
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <div class="card border-primary">
                            <div class="card-header text-white bg-primary">
                                <h3>Langages</h3>
                            </div>
                            <div class="card-body">
                                <dl>
                                    <dt>HTML</dt><dd>Pour le contenu.</dd>
                                    <dt>CSS</dt><dd>Pour la mise en page.</dd>
                                    <dt>PHP</dt><dd>Pour générer du HTML.</dd>
                                    <dt>SQL</dt><dd>Pour les bases de données.</dd>
                                    <dt>Javascript</dt><dd>Pour le comportement.</dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <div class="card border-success">
                            <div class="card-header text-white bg-success">
                                <h3>Planning des amphis</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" style="font-size:0.8rem">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Titre</th>
                                            <th>Langages concernés</th>
                                            <th>Difficulé</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Découverte d'HTML &amp; CSS</td>
                                            <td>HTML5, CSS3</td>
                                            <td><span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Découverte de PHP</td>
                                            <td>HTML5, PHP</td>
                                            <td><span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Base de données</td>
                                            <td>HTML5, PHP, SQL</td>
                                            <td><span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Sessions</td>
                                            <td>PHP, SQL</td>
                                            <td><span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Remise à niveau</td>
                                            <td>HTML5, CSS, PHP, SQL</td>
                                            <td><span class="fas fa-heart"></span> <span class="fas fa-heart"></span> <span class="fas fa-heart"></span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Javascript</td>
                                            <td>Javascript</td>
                                            <td><span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>AJAX</td>
                                            <td>Javascript, PHP, SQL</td>
                                            <td><span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td>Sécurité</td>
                                            <td>PHP, SQL, Javascript</td>
                                            <td><span class="fab fa-hotjar"></span> <span class="fab fa-hotjar"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>
