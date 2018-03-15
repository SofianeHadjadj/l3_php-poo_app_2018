<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
echo date('Y-m-d');
echo $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Ajouter un fichier</title>

</head>
<body>
<form method="post" action="reception.php" enctype="multipart/form-data">
     <label for="mon_fichier">Fichier (tous formats | max. 1 Go) :</label><br />
     <input type="file" name="mon_fichier" id="mon_fichier" required/><br /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" placeholder="Titre du fichier" id="titre" maxlength="50" required/><br /><br />
     <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
     <textarea name="description" id="description" maxlength="255" required></textarea><br /><br />
     Vidéo<input type="radio" name="type" value="vid"/>Audio<input type="radio" name="type" value="aud"/>E-book<input type="radio" name="type" value="eb"/>
    <br />Cinéma<input type="radio" name="categorie" value="cin"/>Documentaire<input type="radio" name="categorie" value="doc"/>Oeuvre commentée<input type="radio" name="categorie" value="oc"/>
     <input type="submit" name="submit" value="Envoyer" />
</form>

</body>
</html>	