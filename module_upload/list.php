<?php
$nb_fichier = 0;
echo '<ul>';

if($dossier = opendir('./upload'))
{
?>

<h2>Liste des fichiers présents dans le dossier <strong>upload</strong></h2>

<form>
	<select name="option">
		<?php
		while(false !== ($fichier = readdir($dossier)))
		{

		if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
		{

		$nb_fichier++; // On incrémente le compteur de 1
		?>
		<option value="<?php echo $fichier ;?>"><?php echo $fichier ;?></option>
		<?php
		//echo '<option>' . $fichier . '</option>';
		//echo '<li><a href="./mondossier/' . $fichier . '">' . $fichier . '</a></li>';

		} // On ferme le if (qui permet de ne pas afficher index.php, etc.)
		 
		} // On termine la boucle

		echo '</ul><br />';
		echo 'Il y a <strong>' . $nb_fichier .'</strong> fichier(s) dans le dossier';
		 
		closedir($dossier);
		?>
 	</select>
</form>

<br><br><button><a href="index.php">Retour</a></button><br><br>

<?php
}
 
else
     echo 'Le dossier n\' a pas pu être ouvert';
?>