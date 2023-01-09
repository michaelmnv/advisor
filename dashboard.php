<?php

// Connexion à la base de données
$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'basedemika';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
  die('Erreur de connexion : ' . mysqli_error($conn));
}

// Requête SQL pour récupérer les données
$sql = 'SELECT * FROM user';
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

  // Récupération et affichage des données
  while ($row = mysqli_fetch_assoc($result)) {
    echo 'ton nom est <td>' . $row['username'] ;

    echo ' ton email est <td>' . $row['email']  ;
    
  }


} else {
  echo 'Aucun enregistrement trouvé';
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);

?>