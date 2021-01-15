<?php
function printLoginForm(){
    $var="welcome";
    if(isset($_GET['page'])){
        $var=$_GET['page'];
    }
    echo "<div class='container'>";
    if (isset($_POST["login"])) echo "<p style='color:#FF0000'>Mauvais login ou mot de passe</p>";
    echo <<<CHAINE_DE_FIN
    <form action="index.php?todo=login&page=$var" method='post'>
        <p>Nom d'utilisateur ou adresse mail: <input type="text" name="login" placeholder="login" required /></p>
        <p>Mot de passe : 
        <input type="password" name="mdp" required />
        </p>
        <p><input type="submit" value="Valider" /></p>

    </form>
</div>
CHAINE_DE_FIN;
}

function printLogoutForm(){
    $var="welcome";
    if(isset($_GET['page'])){
        $var=$_GET['page'];
    }
    echo <<<CHAINE_DE_FIN
<div class="container">
    <form action="index.php?todo=logout&page=$var" method='post'>
        <p><input type="submit" value="Se déconnecter" /></p>
    </form>
</div>
CHAINE_DE_FIN;
}
?>