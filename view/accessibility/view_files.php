<?php
session_start(); 
include('../../model/connexion_BDD.php');
include('../../model/ModeleFichiers.php');
$id_user = $_SESSION['id'];
//Conservation du mode confort de lecture si celui ci existe
if ($_POST['choixFunc'] != "") {
    $_SESSION['confort'] = $_POST['choixFunc'];
}

else {
   $_SESSION['confort'] = $_SESSION['confort']; 
}

if ($_POST['choixPol'] != "") {
    $_SESSION['police'] = $_POST['choixPol'];
}

else {
   $_SESSION['police'] = $_SESSION['police']; 
}
?>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Voir tous les fichiers</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
	<!--Conservation du confort de lecture sur la page-->
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php 
			include('confortLecture.php'); 
			$fichiers=new ModeleFichier();
			$files=$fichiers->voirFichiers();
			echo "<h1>Liste des fichiers</h1>";
			while ($donnees = $files->fetch()) {

				$count++;
				echo "<br>";
				//echo     $donnees['id']."<br>";
				echo $donnees['titre']."<br>";
				echo $donnees['description']."<br>";
				echo $donnees['type']."<br>";
				echo $donnees['categorie']."<br>";
				//echo $donnees['id_user']."<br>";
				echo $donnees['date_upload']."<br><br>";
		?>
				<form method="post" action="add_fav.php">
					<input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
					<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
					<input type="hidden" name="id_file" value="<?php echo $donnees['id']; ?>">
					<input type="submit" value="Ajouter aux favoris">
				</form>
				
		<?php

				if ($donnees['type'] == "vid") {
		?>
					<form method="post" action="show_video.php">
						<input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
						<input type="hidden" name="description" value="<?php echo $donnees['description']; ?>">
						<input type="hidden" name="extension" value="<?php echo $donnees['extension']; ?>">
						<input type="submit" value="voir la video">
					</form>
		<?php
				}
				echo "___________________<br>";
			}

		?>
	</body>
</html>