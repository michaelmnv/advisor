<div class="message-form">
  <!-- On utilise la méthode POST pour envoyer les données du formulaire -->
  <form action="#" method="post">
    <label for="recipient">Destinataire :</label>
    <!-- Le nom de cet input sera utilisé dans le code PHP pour récupérer la valeur -->
    <input type="text" name="recipient" id="recipient">
    <br>
    <label for="subject">Sujet :</label>
    <!-- Le nom de cet input sera utilisé dans le code PHP pour récupérer la valeur -->
    <input type="text" name="subject" id="subject">
    <br>
    <label for="message">Message :</label>
    <!-- Le nom de cet input sera utilisé dans le code PHP pour récupérer la valeur -->
    <textarea name="message" id="message"></textarea>
    <br>
    <!-- Le nom de ce bouton sera utilisé dans le code PHP pour vérifier si le formulaire a été soumis -->
    <button type="submit" name="submit">Envoyer</button>
  </form>
</div>

<li>  <a href='logout.php'> Se déconnecter </a></li>
   <li><a href='index.html'> revenir à la page de connexion </a></li>


<?php

// On vérifie si le formulaire a été soumis
if(isset($_POST['submit'])) {
  // Si oui, on récupère les données du formulaire
  $recipient = $_POST['recipient'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // On prépare les en-têtes du message
  $headers = "From: votre@adresse.com\r\n";
  $headers .= "Reply-To: votre@adresse.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

  // On envoie le message
  $mail_sent = mail($recipient, $subject, $message, $headers);

  // On vérifie si l'envoi du message a réussi
  if($mail_sent) {
    // Si oui, on affiche un message de succès
    echo "Votre message a été envoyé avec succès !";
  } else {
    // Si non, on affiche un message d'erreur
    echo "Une erreur est survenue lors de l'envoi du message.";
  }
}

?>
<style>
    
.message-form {
width: 500px;
margin: 0 auto;
background-color: #f7f7f7;
border: 1px solid #ccc;
padding: 20px;
}

.message-form form {
display: flex;
flex-direction: column;
}

.message-form label {
font-weight: bold;
margin-bottom: 5px;
}

.message-form input,
.message-form textarea {
width: 100%;
padding: 10px;
border: 1px solid #ccc;
font-size: 16px;
margin-bottom: 20px;
box-sizing: border-box;
}

.message-form button {
background-color: #4CAF50;
color: #fff;
font-size: 16px;
padding: 10px 20px;
border: none;
cursor: pointer;<div class="message-form">
  <form action="#" method="post">
    <label for="recipient">Destinataire :</label>
    <input type="text" name="recipient" id="recipient">
    <br>
    <label for="subject">Sujet :</label>
    <input type="text" name="subject" id="subject">
    <br>
    <label for="message">Message :</label>
    <textarea name="message" id="message"></textarea>
    <br>
    <button type="submit" name="submit">Envoyer</button>
  </form>
  <?php
  if(isset($_POST['submit'])) {
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = "From: votre@adresse.com\r\n";
    $headers .= "Reply-To: votre@adresse.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $mail_sent = mail($recipient, $subject, $message, $headers);

    if($mail_sent) {
      echo "<p>Votre message a été envoyé avec succès !</p>";
    } else {
      echo "<p>Une erreur est survenue lors de l'envoi du message.</p>";
    }
  }
  ?>
</div>
}

.message-form button:hover {
background-color: #45a049;
}
    </style>