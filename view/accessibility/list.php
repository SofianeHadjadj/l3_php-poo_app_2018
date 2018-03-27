<?php
session_start(); 
$id_user = $_SESSION['id'];
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
$nb_fichier = 0;
echo '<ul>';

if($dossier = opendir('../../files/upload'))
{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Liste des média</title>
<link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
</head>
<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
	<?php include('confortLecture.php'); ?>

<form>
	<label for="option"><h2>Liste des fichiers uploadés :</h2></label><br><br>
	<select id="option" name="option">
		<?php
		while(false !== ($fichier = readdir($dossier)))
		{

		if($fichier != '.' && $fichier != '..' && $fichier != 'ajouter.php')
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

<br><br><button><a href="ajouter.php">Retour</a></button><br><br>

<?php
}
 
else
     echo 'Le dossier n\' a pas pu &ecirc;tre ouvert';
?>
</body>