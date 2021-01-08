<!DOCTYPE html>
 
<html>
 
<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>
 
<body>
  <h1>Mon premier formulaire !</h1>
 
  <?php
  if(isset($_GET["prenom"]) && $_GET["prenom"] != "" && isset($_GET["genre"])) {
    echo "<p>Bonjour, " . ($_GET["genre"] == "f" ? "Mlle " : "M. ") . $_GET["prenom"] . " !</p>";
  } else {
  ?>
 
  <form action="formulaire3.php" method="get">
    <p>Prénom : <input type="text" name="prenom" required /></p>
    <p>Genre :
      <input name="genre" value="f" type="radio" checked="checked" required />F
      <input name="genre" value="m" type="radio" />M
    </p>
    <p><input type="submit" value="Valider" /></p>
 
  </form>
 
  <?php
  }
  ?>
</body>
 
</html>