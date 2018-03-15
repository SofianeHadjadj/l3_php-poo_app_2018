<?php
session_start(); 
include('connexion_BDD.php');

$id_user = $_SESSION['id'];

$count =0;

	$reponse = $dbh->query("SELECT * FROM valid_upload");

	echo "<h3>Fichiers a valider</h3>";

	while ($donnees = $reponse->fetch()) {

		$count++;

		echo "___________________<br>";

		?>

	    <form method="post" action="trait_vf.php">
	      id : <input type="hidden" name="id" value="<?php echo $donnees["id"];?>"><?php echo $donnees["id"];?><br>
	      Titre : <input type="hidden" name="titre" value="<?php echo $donnees["titre"];?>"><?php echo $donnees["titre"];?><br>
	      Description : <input type="hidden" name="description" value="<?php echo $donnees["description"];?>"><?php echo $donnees["description"];?><br>
	      Type : <input type="hidden" name="type" value="<?php echo $donnees["type"];?>"><?php echo $donnees["type"];?><br>
	      Categorie : <input type="hidden" name="categorie" value="<?php echo $donnees["categorie"];?>"><?php echo $donnees["categorie"];?><br>
	      Extension : <input type="hidden" name="extension" value="<?php echo $donnees["extension"];?>"><?php echo $donnees["extension"];?><br>
	      Id user : <input type="hidden" name="id_user" value="<?php echo $donnees["id_user"];?>"><?php echo $donnees["id_user"];?><br>
	      Date d'upload : <input type="hidden" name="date_upload" value="<?php echo $donnees["date_upload"];?>"><?php echo $donnees["date_upload"];?><br>

	      <input type="submit" value="Valider">
	      
	    </form>

		<?php

	    	//echo $count;
		echo "___________________<br>";
	}

?>