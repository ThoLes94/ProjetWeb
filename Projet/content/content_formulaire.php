<h1>Mon premier formulaire !</h1>
 
  <?php
  if(isset($_POST["prenom"]) && $_POST["prenom"] != "" && isset($_POST["genre"])) {
    echo "<p>Bonjour, " . ($_POST["genre"] == "f" ? "Mlle " : "M. ") . $_POST["prenom"] . " !</p>";
  } else {
  ?>
 
  <form action="" method="post">
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