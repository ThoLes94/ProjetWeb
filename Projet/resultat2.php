<!DOCTYPE html>

<html>

<head>
  <title>Formulaire</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
</head>

<body>
  <p>Formulaire soumis.</p>

  <p>
  <?php
  echo "Bonjour, " . ($_POST["genre"] == "f" ? "Mlle " : "M. ") . $_POST["prenom"] . " !";
  ?>
  </p>
</body>

</html>
