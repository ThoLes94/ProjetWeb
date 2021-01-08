<!DOCTYPE html>

<html>

<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>

<body>
  <p>Formulaire soumis.</p>
  <?php
  echo "Bonjour, " . ($_GET["genre"] == "f" ? "Mlle " : "M. ") . $_GET["prenom"] . " !";
  ?>
</body>

</html>
