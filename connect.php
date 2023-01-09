<!DOCTYPE html>
<html>
<head>
  <title>Site de Michael Minev</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #3b5998;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      height: 50px;
    }

    header h1 {
      margin: 0;
      font-size: 22px;
    }

    header nav {
      display: flex;
    }

    header nav a {
      color: white;
      text-decoration: none;
      margin-left: 20px;
      font-size: 14px;
    }

    main {
      display: flex;
    }

    main aside {
      width: 250px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    main aside h2 {
      margin: 0;
      font-size: 16px;
      margin-bottom: 10px;
    }

    main aside ul {
      list-style: none;
      margin: 0;
      padding: 0;
    }

    main aside ul li {
      margin-bottom: 10px;
    }

    main aside ul li a {
      color: #333;
      text-decoration: none;
      display: block;
    }

    main aside ul li a:hover {
      color: #3b5998;
    }

    main .content {
      flex: 1;
      padding: 20px;
    }

    main .content h2 {
      margin: 0;
      font-size: 18px;
      margin-bottom: 10px;
    }

    main .content .post {
      border: 1px solid #ccc;
      margin-bottom: 20px;
      padding: 10px;
    }

    main .content .post h3 {
      margin: 0;
      font-size: 16px;
      margin-bottom: 5px;
    }

    main .content .post p {
      font-size: 14px;
      margin: 0;
      margin-bottom: 10px;
    }

    main .content .post .date {
      color: #999;
      font-size: 12px;
    }
  </style>
</head>
<body>
  <header>
    <h1>Site de Michael Minev</h1>
      <main>
      <?php
// Démarrage de la session
session_start();

// Vérification de la connexion de l'utilisateur
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Récupération de l'utilisateur connecté depuis la session
    $username = $_SESSION['username'];

    // Affichage d'un message de bienvenue à l'utilisateur
    echo "Bienvenue, " . $username . "!";
} else {
    // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
    header("Location: blank");
    exit;
}


?>
  </main>

    <nav>
      <a href="#">Accueil</a>
      <a href="#">Amis</a>
      <a href="#">Messages</a>
      <a href="#">Notifications</a>
    </nav>
  </header>
  <main>
    <aside>
      <h2>Menu</h2>
      <ul>
        <li><a href="#">Mon profil</a></li>
         <li><a href="musique.html">ma musique</a></li>
            <li><a href="chat.php">Envoyer un message via mail</a></li>
          <li><a href="chat2.php">Envoyer un message à un utilisateur du site</a></li>
            <li><a href="#">Mon portefollio</a></li>
            <li><a href="produits.php">Produits</a></li>
            <li><a href="#">Mon CV</a></li>
            <li><a href="#">Contact</a></li>
          <li><a href='index.html'> revenir à la page de connexion </a></li>
        <li>  <a href='logout.php'> Se déconnecter </a></li>