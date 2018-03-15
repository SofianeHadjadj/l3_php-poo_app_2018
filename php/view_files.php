<?php
session_start(); 
include('connexion_BDD.php');

$id_user = $_SESSION['id'];

	$reponse = $dbh->query("SELECT * FROM fichiers WHERE statut = 1");

	echo "<h3>Liste des fichiers</h3>";

	while ($donnees = $reponse->fetch()) {

		$count++;

		echo "___________________<br>";

		echo     $donnees['id']."<br>";
		echo     $donnees['titre']."<br>";
		echo     $donnees['description']."<br>";
		echo     $donnees['type']."<br>";
		echo     $donnees['categorie']."<br>";
		echo     $donnees['id_user']."<br>";
		echo     $donnees['date_upload']."<br><br>";
?>
	<form method="post" action="add_fav.php">
		<input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
		<input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
		<input type="hidden" name="id_file" value="<?php echo $donnees['id']; ?>">
		<input type="submit" value="Ajouter aux favoris">
	</form>

<?php
		echo "___________________<br>";
	}

?>