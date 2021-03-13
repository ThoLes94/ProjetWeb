<h1> Réservé aux administrateurs</h1>

<?php

if ($_SESSION["loggedIn"]) {
    $login = $_SESSION["login"];
    if (isset($_GET["todo"]) && $_GET["todo"] == "upload") {
        $user = Utilisateur::getUtilisateur($dbh, $login);
        if ($user == false) {
            echo "<p> Vous devez être identifié pour ajouter une image</p>";
        } else {
            if (!empty($_FILES['fichier']['tmp_name']) && is_uploaded_file($_FILES['fichier']['tmp_name'])) {
                // Le fichier a bien été téléchargé
                // Par sécurité on utilise getimagesize plutot que les variables $_FILES
                list($larg, $haut, $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);
                // JPEG => type=2
                // echo $type;
                if ($type == 3 || $type == 2) {
                    $id = Image::compterImages($dbh) + 1;
                    if (move_uploaded_file($_FILES['fichier']['tmp_name'], 'images/actis/activite-photo-' . $id . '.jpg')) {
                        if (Image::insererImage($dbh, $id, $_POST['legende'], $_POST['date'])) {
                            echo "Copie réussie";
                        }
                    } else {
                        echo "echec de la copie";
                    }
                } else echo "mauvais type de fichier ";
            }
        }
    } else printFormImage();
}
