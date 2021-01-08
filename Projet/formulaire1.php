<!DOCTYPE html>
 
<html>
 
<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>
  <h1>Mon premier formulaire !</h1>
 
  <form action="resultat1.php" method="get">
    <p>Prénom : <input type="text" name="prenom" /></p>
    <p>Genre :
      <input name="genre" value="f" type="radio" checked="true" />F
      <input name="genre" value="m" type="radio" />M
    </p>
    <p><input type="submit" value="Valider" /></p>
  </form>
</body>
 
</html>