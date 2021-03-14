<?php
function addPhotos($dbh, $file)
{
    $login = $_SESSION['login'];
    $user = Utilisateur::getUtilisateur($dbh, $login);
    if ($user == false) {
        echo "<p> Vous devez être identifié pour ajouter une image</p>";
        return false;
    } else {
        if (!empty($file) && is_uploaded_file($file)) {
            // Le fichier a bien été téléchargé
            // Par sécurité on utilise getimagesize plutot que les variables $_FILES
            list($larg, $haut, $type, $attr) = getimagesize($file);
            // JPEG => type=2
            if ($type == 3 || $type == 2) {
                $id = Image::compterImages($dbh) + 1;
                if (move_uploaded_file($file, 'images/actis/activite-photo-' . $id . '.jpg')) {
                    creerCopie($id);
                    if (Image::insererImage($dbh, $id, $_POST['legende'], $_POST['date'])) {
                        return true;
                    }
                } else {
                    echo "echec de la copie";
                    return false;
                }
            } else echo "mauvais type de fichier ";
        }
    }
    return false;
}



function creerCopie($id)
{
    $photoHD = 'images/actis/activite-photo-' . $id . '.jpg';
    $newWidth = 100;

    // $photoHD est le chemin vers votre photo HD

    list($widthOrig, $heightOrig) = getimagesize($photoHD);

    $ratio = $widthOrig / $newWidth;
    $newHeight = $heightOrig / $ratio;

    $tmpPhotoLD = imagecreatetruecolor($newWidth, $newHeight);
    $image = imagecreatefromjpeg($photoHD);
    imagecopyresampled($tmpPhotoLD, $image, 0, 0, 0, 0, $newWidth, $newHeight, $widthOrig, $heightOrig);

    // $photoLD est le chemin vers votre nouvelle photo LD
    $photoLD = 'images/actis/activite-photo-' . $id . '_copy.jpg';
    imagejpeg($tmpPhotoLD, $photoLD, 100);
}

function removePhoto($id,$dbh)
{
    try {
        $src1 = "images/actis/activite-photo-" . $id . ".jpg";
        $src2 = "images/actis/activite-photo-" . $id . "_copy.jpg";
        if (Image::suppImage($id, $dbh)) {
            unlink($src1);
            unlink($src2);
            echo '<script> myAlert("Suppression <i>réussie</i>", "myalert-success")</script>';
        } else echo '<script> myAlert("Suppression <i>échouée</i>", "myalert-danger")</script>';
    } catch (Exception $e) {
    }
}
