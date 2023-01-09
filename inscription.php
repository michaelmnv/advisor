<link rel="stylesheet" href="styleinscription.css">
<!-- Formulaire d'inscription -->
<form action="inscription.php" method="post">
	<div class="section text-center">
		<h4>Inscription</h4>
		<div class="form-group">
			<input type="text" name="username" class="form-style" placeholder="Votre username" id="username" autocomplete="off" required>
		</div>	
		<div class="form-group mt-2">
			<input type="password" name="password" class="form-style" placeholder="Votre Mot de passe" id="logpass" autocomplete="off" required>
		</div>
		<input class="btn mt-4" type="submit" value="S'inscrire">
		<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Mot de passe oublié ? (la fonction mot de passe oublié ne fonctionne pas encore)</a></p>
		<a href='index.html'> revenir à la page de connexion </a>
	</div>
</form>

<?php
// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "basedemika";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Récupération des données du formulaire

  $username = isset($_POST['username']) ? trim($_POST['username']) : '';
  $password = isset($_POST['password']) ? trim($_POST['password']) : '';
  
  // Vérification de l'existence des clés "username" et "password" dans le tableau $_POST
  if (!array_key_exists('username', $_POST) || !array_key_exists('password', $_POST)) {
    // Si l'une des clés n'existe pas, affiche un message d'erreur
    echo 'Veuillez entrer "username" et "password" dans les champs';
    exit;
  }
  
  // Vérification que les champs "username" et "password" ne sont pas vides
  if (empty($username) || empty($password)) {
    // Si l'un des champs est vide, affiche un message d'erreur
    echo 'Veuillez remplir tous les champs';
    exit;
  }

   // Hachage du mot de passe


  // Préparation de la requête d'insertion
  $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Liaison des paramètres
  mysqli_stmt_bind_param($stmt, "ss", $username, $password);

  // Exécution de la requête
  if (mysqli_stmt_execute($stmt)) {
      // Activation du tampon de sortie
      ob_start();

      // Redirection vers la page d'accueil
      header('Location: /login2.php');
      exit;
  } else {
      echo "Erreur lors de l'inscription: " . mysqli_error($conn);
  }

  // Fermeture de la requête préparée
  mysqli_stmt_close($stmt);
}



// Fermeture de la connexion à la base de données
mysqli_close($conn);
