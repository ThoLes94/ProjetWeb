<!DOCTYPE html>

<html>

<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>

<body>
  <h1>Mon premier formulaire !</h1>

  <form action="resultat2.php" method="post">
    <p>Prénom : <input type="text" name="prenom" /></p>
    <p>Genre :
      <input checked="true" name="genre" value="f" type="radio" />F
      <input name="genre" value="m" type="radio" />M
    </p>
    <p><input type="submit" value="Valider" /></p>
  </form>
</body>

</html>
