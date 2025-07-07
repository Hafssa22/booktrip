<?php 
include 'config.php';
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

if (!empty($search)) {
    $sql = "SELECT * FROM livres 
            WHERE titre LIKE '%$search%' 
            OR categorie LIKE '%$search%' 
            ORDER BY id DESC";
} else {
    $sql = "SELECT * FROM livres ORDER BY id DESC";
}

$result = $conn->query($sql);

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des livres</title>
    <link rel = "stylesheet" href="livre.css">
</head>
<body class="body1">
       <header class="site-header">
         <div class="logo">BookTrip</div>
           <nav class="nav-menu">
             <a href="acceuil.php">Accueil</a>
             <a href="ajouter.php">Ajouter un livre</a>
             <a href="index.php">Découvrir</a>
           </nav>
         <div class="search-bar">
            <form method="GET" action="index.php">
              <div class ="search-wrapper">
                <input type="text" name="search" placeholder="Rechercher un livre ou une catégorie..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
                <button type="submit" class="search-btn" aria-label="Rechercher">🔍</button>
              </div>  
           </form>
         </div>
       </header>

       <h1> Livres Disponibles </h1>
        <a href="ajouter.php" class="btn"> Ajouter un livre</a>

        <div class="grilles-livres">
          <?php while($row = $result->fetch_assoc()) { ?>
          <div class="carte-livre">
             <img src="<?= $row['image'] ?>" alt="Image du livre" class="img-livre">
             <h3><?= htmlspecialchars($row['titre']) ?></h3>
             <p><?= htmlspecialchars($row['resume']) ?></p>
             <span class="note">⭐ <?= $row['note'] ?>/5</span>
            </div>
          <?php } ?>  
       </div>
</body>
</html>