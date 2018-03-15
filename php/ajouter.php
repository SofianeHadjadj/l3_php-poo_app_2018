<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title> Ajouter un fichier</title>

</head>
<body>

<?php 
session_start(); // On démarre la session 
include('connexion_BDD.php');
include("upload.php");
$id=$_SESSION['id'];

 ?>
<br><br>
 <a href="list.php">Voir la liste des fichiers envoyés</a>

</body>
</html>