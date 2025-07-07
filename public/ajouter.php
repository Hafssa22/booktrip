<?php include 'config.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de livre</title>
    <link rel="stylesheet" href="livre.css">
</head>
<body class='bodyAjouter'>
    <header class="site-header">
  <div class="logo">BookTrip</div>
  <nav class="nav-menu">
    <a href="acceuil.php">Accueil</a>
    <a href="ajouter.php">Ajouter un livre</a>
    <a href="index.php">Découvrir</a>
  </nav>
</header>
    <div class="conteneur-form">
    <div class="formulaire-ajout">
    <h3>Tu as tourné la dernière page ? Partage ton voyage avec nous !</h3>
   <form action="ajouter.php" method = "POST" action = "multipart/form-data">
       <input type = "text" name = "titre" placeholder = "Titre" required><br>
       <input type = "text" name = "categorie" placeholder="Categorie"><br>
       <label for="image">Image du livre :</label>
       <input type="file" name="image" accept="image/*" required>
       <textarea name = "resume" placeholder = "Resume" rows = "4" required></textarea><br>
       <input type = "number" name = "evaluation" placeholder ="Evaluation de 1 a 5" min="1" max="5" required><br>
       <button type="submit" class="btn">Ajouter</button>
       <a href="index.php" class="btn">Voir les livres</a>
       
  </form>
</div>
</div>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $categorie = $_POST['categorie'];
    $resume = $_POST['resume'];
    $evaluation = $_POST['evaluation'];

    $stmt = $conn->prepare("INSERT INTO livres (titre, categorie, resume, evaluation) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $titre, $categorie, $resume, $evaluation);
    $stmt->execute();

    echo "<p>Livre ajouté avec succès !</p>";
    $stmt->close();
}
$conn->close();
?>


        
</body>
</html>