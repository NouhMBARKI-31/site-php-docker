<?php
// Bloc PHP en tout début de fichier
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $nom = htmlspecialchars($_POST["nom"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);

// Enregistrement dans fichier texte
  $ligne = "Nom: $nom | Email: $email | Message: $message\n";
  file_put_contents("messages.txt", $ligne, FILE_APPEND);

  // Message à afficher après envoi
  $confirmation = "Merci $nom, on a bien reçu ton message !";
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

 <h1>Page de contact</h1>

  <!-- MENU DE NAVIGATION -->
  <nav>
    <a href="index.php">Accueil</a> |
    <a href="contact.php">Contact</a> |
    <a href="apropos.php">À propos</a>
    <a href="admin.php">Admin</a>
  </nav>

  <!-- FORMULAIRE HTML -->
  <form method="post">
    <input type="text" name="nom" placeholder="Ton nom" required>
    <input type="email" name="email" placeholder="Ton email" required>
    <textarea name="message" placeholder="Ton message" required></textarea>
    <button type="submit">Envoyer</button>
  </form>

  <!-- AFFICHAGE DU MESSAGE DE CONFIRMATION -->
  <?php if (isset($confirmation)) {
    echo "<p>$confirmation</p>";
  } ?>

</body>
</html>

