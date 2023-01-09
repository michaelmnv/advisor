<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajout d'amis</title>
    <!-- Liens vers vos fichiers CSS et JavaScript -->
    <link rel="stylesheet" type="text/css" href="stylechat2.css">
    
  </head>
  <body>
    <!-- En-tête de l'interface -->
    <div class="header">
      <h1>Ajout d'amis</h1>
    </div>

    <!-- Conteneur principal de l'interface -->
    <div class="main-container">
      <!-- Conteneur de la liste des amis -->
      <div class="friends-container">
        <h2 class='highlight'>Mes amis</h2>
        <ul>
       
            
            
            
            <!-- Chargement de Socket.io -->
<script src="/socket.io/socket.io.js"></script>

<!-- Bouton d'ouverture du chat -->
<button id="open-chat-button">Ouvrir le chat</button>

<!-- Fenêtre de chat -->
<div id="chat-window" style=";">
  <!-- Zone de discussion -->
  <div id="chat-messages"></div>

  <!-- Formulaire d'envoi de message -->
  <form id="chat-form">
    <input type="text" id="chat-input" placeholder="Entrez votre message...">
    <button type="submit">Envoyer</button>
     <button><a href='connect.php'> revenir au menu première page</a></button>
  </form>
</div>
        

<!-- Initialisation de Socket.io -->
<script>
  // Connexion au serveur de chat
  const socket = io();

  // Gestion de l'ouverture et de la fermeture de la fenêtre de chat
  const chatButton = document.getElementById('open-chat-button');
  const chatWindow = document.getElementById('chat-window');
  chatButton.addEventListener('click', () => {
    chatWindow.style.display = chatWindow.style.display === 'none' ? 'block' : 'none';
  });

  // Gestion des messages du chat
  const chatMessages = document.getElementById('chat-messages');
  const chatForm = document.getElementById('chat-form');
  const chatInput = document.getElementById('chat-input');

  // Envoi d'un message au serveur
  chatForm.addEventListener('submit', (event) => {
    event.preventDefault();
    socket.emit('message', chatInput.value);
    chatInput.value = '';
  });

  // Réception d'un message du serveur
  socket.on('message', (message) => {
    chatMessages.innerHTML += `<div>${message}</div>`;
  });
</script>

            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            <?php
// Connexion à la base de données
$db = mysqli_connect("localhost", "root", "", "basedemika");

// Récupération de l'utilisateur actuel
$current_user = "john";

// Traitement de la demande d'ajout d'ami
if (isset($_POST['add_friend'])) {
  $friend_username = mysqli_real_escape_string($db, $_POST['friend_username']);

  // Ajout de l'ami à la table des amis
  $query = "INSERT INTO friends (username, friend_id) VALUES ('$current_user', '$friend_username')";
  mysqli_query($db, $query);
  echo "<p><span class='highlight'>Ami ajouté</p></span>";
}

// Traitement de la demande de suppression d'ami
if (isset($_POST['delete_friend'])) {
  $friend_username = mysqli_real_escape_string($db, $_POST['friend_username']);

  // Suppression de l'ami de la table des amis
  $query = "DELETE FROM friends WHERE (username='$current_user' AND friend_id='$friend_username') OR (username='$friend_username' AND friend_id='$current_user')";
  mysqli_query($db, $query);
  echo "<p><span class='highlight'>Ami supprimé</p></span>";
}

// Affichage de la liste des amis de l'utilisateur
echo "<h2 class='highlight'>Mes amis</h2>";
echo "<ul>";

$query = "SELECT * FROM friends WHERE username='$current_user' OR friend_id='$current_user'";
$result = mysqli_query($db, $query);

// Vérifiez que la variable $result est définie avant de l'utiliser
if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    $friend_username = $row['username'];
    if ($friend_username == $current_user) {
      $friend_username = $row['friend_id'];
    }
    // Affichage d'un bouton de suppression pour chaque ami
    if (isset($friend_username)) {

echo "<form method='post'>";
echo "<input type='hidden' name='friend_username' value='$friend_username'>";
echo "<button class='delete-friend' type='submit' name='delete_friend'>Supprimer</button>";
echo "</form>";
    }
    echo "<li>" . $friend_username . "</li>";
  }
}

echo "</ul>";



// Affichage de la liste de tous les utilisateurs inscrits sur le site
echo "<h2></h2>";
echo "<ul>";
            
  // Requête SQL pour récupérer tous les utilisateurs inscrits sur le site
  $query = "SELECT * FROM user";
  $result = mysqli_query($db, $query);

  // Vérifiez que la variable $result est définie avant de l'utiliser
  if ($result) {
    while ($row = mysqli_fetch_array($result)) {
      $username = $row['username'];
      if ($username != $current_user) {
          // Affichage d'un bouton d'ajout d'ami et du nom de l'utilisateur à côté
echo "<form method='post'>";
echo "<input type='hidden' name='friend_username' value='$username'>";
echo "<button class='add-friend' type='submit' name='add_friend'>Ajouter</button>";
echo "</form>";
echo $username;

      }
    }
  }
  echo "</ul>";
            

            

 
