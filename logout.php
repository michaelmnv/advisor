<?php
// Démarrage de la session
session_start();

// Suppression des variables de session et de la session
session_unset();
echo "<br><a href='index.html'>revenir à la page de connexion</a>";
?>