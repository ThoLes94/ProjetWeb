<?php
public function printFormEvent(){
    $prenom=$_SESSION['prenom'];
    echo "<p> Bonjour $prenom, </p>";
    echo "<p> Nous sommes ravis de voir que vous vous intéressez à cet événement, remplissez le formulaire ci-dessous pour confirmer votre inscription </p>";
    ?>
    <form action="index.php?todo=inscription_cours&page=inscription_cours" method="post">
    <p>Nom d'utilisateur : <input type="text" name="login" value="<?php echo $login ?>" required /></p>
    <p>Adresse e-mail : <input type="email" name="email" required /></p>
    <p><input type="submit" value="Valider" /></p>
    </form>
    <?php

    }
    ?>

