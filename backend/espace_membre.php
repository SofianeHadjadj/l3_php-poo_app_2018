<?php
session_start(); 
include('connexion_BDD.php');

$id_user = $_SESSION['id'];
$base = 'http://perso-cvtic.unilim.fr/DW02_2018/Capture/upload/';

	$response = $dbh->query("SELECT * FROM fichiers INNER JOIN favoris WHERE favoris.id_user = $id_user AND favoris.id_file = fichiers.id");

	echo "<h3>Mes favoris</h3>";

	while ($data = $response->fetch()) {

	    if ($data["statut"] == 1) {

	    	echo "<strong>Titre :</strong> ".$data["titre"]." ";
	    	echo "<strong>Description :</strong> ".$data["description"]." ";
	    	echo "<strong>Lien vers le fichier :</strong>  <a href='".$base.$data["titre"].".".$data["extension"]."'>Lien</a><br><br>";
	    }
	}

	$response->closeCursor();


	$reponse = $dbh->query("SELECT * FROM fichiers WHERE id_user = $id_user");

	echo "<h3>Mes fichiers uploades</h3>";

	while ($donnees = $reponse->fetch()) {

	    if ($donnees["statut"] == 1) {

	    	echo "<strong>id :</strong> ".$donnees["id"]." ";
	    	echo "<strong>Titre :</strong> ".$donnees["titre"]." ";
	    	echo "<strong>Description :</strong> ".$donnees["description"]." ";
	    	echo "<strong>Lien vers le fichier :</strong>  <a href='".$base.$donnees["titre"].".".$donnees["extension"]."'>Lien</a><br><br>";
	    }
	}


?>