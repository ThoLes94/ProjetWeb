<?php
function addPhotos($dbh, $file){
    $login = $_SESSION['login'];
    $user = Utilisateur::getUtilisateur($dbh, $login);
        if ($user == false) {
            echo "<p> Vous devez être identifié pour ajouter une image</p>";
        } else {
            if (!empty($file) && is_uploaded_file($file)) {
                // Le fichier a bien été téléchargé
                // Par sécurité on utilise getimagesize plutot que les variables $_FILES
                list($larg, $haut, $type, $attr) = getimagesize($file);
                // JPEG => type=2
                if ($type == 3 || $type == 2) {
                    $id = Image::compterImages($dbh) + 1;
                    if (move_uploaded_file($file, 'images/actis/activite-photo-' . $id . '.jpg')) {
                        if (Image::insererImage($dbh, $id, $_POST['legende'], $_POST['date'])) {
                            echo "Copie réussie";
                        }
                    } else {
                        echo "echec de la copie";
                    }
                } else echo "mauvais type de fichier ";
            }
        }
}