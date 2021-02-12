<?php
function printFormEvent(){
    $prenom=$_SESSION['prenom'];
    echo "<p> Bonjour $prenom, </p>";
    echo "<p> Nous sommes ravis de voir que vous vous intéressez à cet événement, remplissez le formulaire ci-dessous pour confirmer votre inscription </p>";
    ?>
    <form action="index.php?todo=inscription_cours&page=inscription_cours" method="post">
    <p>Evénemment : <input type="int" required name='id_evenement'/></p>
    <p>Nom d'utilisateur : <input type="text"  value="<?php echo $_SESSION['login']?>" required name="login"/></p>
    <p>Adresse e-mail : <input type="email" name="email" required /></p>
    <p>Mot de passe : <input type="password" name="mdp" required name='mdp' /></p>
    <p><input type="submit" value="Valider" /></p>
    </form>
    <?php

    }
    ?>

