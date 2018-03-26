<?php
  
  session_start();

  session_destroy(); // fermer la sessions

  header('location:index.php'); // redirection vers l'accueil
?>