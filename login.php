<link rel="stylesheet" href="stylogin.css">

<?php
// Démarrage de la session
session_start();

// Connexion à la base de données
$host = "localhost";
$username = "root";
$password = "";
$dbname = "basedemika";

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Récupération des données du formulaire de connexion
        $username = $_POST['username'];
        $password = $_POST['password'];
    } else {
        // Si les champs sont vides, on affiche un message d'erreur
        echo "";
        
    }
    
        
}
   


// Requête pour récupérer les données de l'utilisateur depuis la base de données
$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

// Si un utilisateur a été trouvé, on démarre une nouvelle session et on enregistre les données de l'utilisateur dans la session
if (mysqli_num_rows($result) == 1) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
}

// Si l'utilisateur est connecté, on affiche un message de bienvenue et un bouton de déconnexion
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
     header("Location: connect.php");
      exit();

} else {
    // Si l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    echo "";
    ?>

   
      
    <body>
        <div class="container">
            <div class="content">
                <div class="title" title="connexion">Connexion</div>
     
                <div class="info"><br />
                      <span>Veuillez vous connecter</span><br />
                      Toute l'équipe vous remercie de votre visite !<br />

                </div>
                <div class="opt">
                  <div><a title="revenir à la page d'accueil" href="index.html">Revenir à la page d'accueil</a></div>
                    <br /><br />
                        <form action="login.php" method="post">
        <label for="username">Nom d'utilisateur :</label><br>
        <input type="text" id="username" name="username" class="form-style" ><br>
        <label for="password">Mot de passe :</label><br>
        <input class="form-style" type="password" id="password" name="password"><br><br>
        <input class="btn mt-4" type="submit" value="Se connecter">
    </form>
                    
                    
                </div>
            </div>

        </div>
    </body>




    <?php
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

