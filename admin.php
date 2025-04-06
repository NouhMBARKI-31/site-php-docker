<?php
session_start();

// Déconnexion
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: admin.php");
    exit();
}

// Identifiants simples
$utilisateur = "admin";
$motdepasse = "1234";

// Traitement du formulaire de connexion
if (isset($_POST["login"])) {
    if ($_POST["username"] === $utilisateur && $_POST["password"] === $motdepasse) {
        $_SESSION["connecté"] = true;
    } else {
        $erreur = "Identifiants incorrects.";
    }
}

// Si l'utilisateur n'est pas connecté, afficher le formulaire
if (!isset($_SESSION["connecté"])) {
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Connexion admin</title>
  <style>
    body { font-family: Arial; padding: 40px; background-color: #f7f7f7; }
    form { max-width: 300px; margin: auto; background: #f4f4f4; padding: 20px; }
    input, button { width: 100%; margin-bottom: 10px; padding: 10px; }
    h2 { text-align: center; }
  </style>
</head>
<body>
  <h2>🔒 Connexion à l’espace admin</h2>
  <?php if (isset($erreur)) echo "<p style='color:red;'>$erreur</p>"; ?>
  <form method="post">
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit" name="login">Se connecter</button>
  </form>
</body>
</html>
<?php exit(); } ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Messages reçus</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f7f7f7; }
    h1 { color: #333; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #007BFF; color: white; }
    tr:nth-child(even) { background: #f2f2f2; }
    .logout { margin-bottom: 20px; display: inline-block; }
  </style>
</head>
<body>

  <h1>📬 Messages reçus via le formulaire</h1>
  <p class="logout"><a href="?logout=1">🔓 Se déconnecter</a></p>

  <?php
  $fichier = "messages.txt";

  if (file_exists($fichier)) {
      $lignes = file($fichier, FILE_IGNORE_NEW_LINES);

      if (count($lignes) > 0) {
          echo "<table><tr><th>Nom</th><th>Email</th><th>Message</th></tr>";
          foreach ($lignes as $ligne) {
              $parts = explode(" | ", $ligne);
              $nom = str_replace("Nom: ", "", $parts[0]);
              $email = str_replace("Email: ", "", $parts[1]);
              $message = str_replace("Message: ", "", $parts[2]);
              echo "<tr><td>$nom</td><td>$email</td><td>$message</td></tr>";
          }
          echo "</table>";
      } else {
          echo "<p>Aucun message pour le moment.</p>";
      }
  } else {
      echo "<p>Le fichier messages.txt n'existe pas encore.</p>";
  }
  ?>
</body>
</html>
