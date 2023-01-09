<?php
  // Connexion à la base de données
  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "basedemika";
  $conn = mysqli_connect($host, $user, $password, $dbname);
  // Vérification de la connexion
  if (!$conn) {
    die("Erreur de connexion : " . mysqli_connect_error());
  }

  // Récupération des produits de la base de données
  $query = "SELECT * FROM products";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) > 0) {
    // Affichage des produits dans un carrousel
    echo '<div id="carousel" style="overflow: hidden; white-space: nowrap;">';
    while($row = mysqli_fetch_assoc($result)) {
      $name = $row['name'];
      $description = $row['description'];
      $price = $row['price'];
      echo '<div class="product">';
      echo '  <h3>Nom : ' . $name . '</h3>';
      echo '  <p>Description : ' . $description . '</p>';
      echo '  <p>Prix : ' . $price . '€</p>';
      echo '</div>';
    }
    echo '</div>';
  } else {
    echo "Aucun produit trouvé.";
  }

  // Fermeture de la connexion à la base de données
  mysqli_close($conn);
?>