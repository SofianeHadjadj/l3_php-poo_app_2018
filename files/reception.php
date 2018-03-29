<?php
session_start(); // On démarre la session 

if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {
	header('refresh:2;url=../view/accessibility/ajouter.php');
}
else {
	header("location:".$_SERVER['HTTP_REFERER']);
}

include('../model/connexion_BDD.php');
include('../model/ModeleFichiers.php');

if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {

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

	include('../view/accessibility/conservationConfortLecture.php');
?>
	<html lang="fr">
	    <head>
	        <meta charset="utf-8" />
	        <title>Reception</title>
	        <link href="style.css" rel="stylesheet">
	        <link rel="stylesheet" media="screen" href="../view/accessibility/confort_lecture/style.css" />
	    </head>
	    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
<?php

}

if(isset($_FILES['mon_fichier'])) {

	$date_up=date('Y-m-d');
	$ext = '';
 
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
	$dossier = 'upload/';
	$nom = $_POST['titre'];
	$fichier = "{$nom}.{$extension_upload}";
	if ($extension_upload == "pdf" || $extension_upload == "mp3" || $extension_upload == "ogg" || $extension_upload == "wav" || $extension_upload == "avi" || $extension_upload == "mp4" || $extension_upload == "mkv" || $extension_upload == "flv") {
		if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier)){
			if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {
				echo '<br><br><p>Upload effectu&eacute; avec succ&eacute;s !</p><br><br>';
			}
			else {
				$_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; upload&eacute; sur le serveur";
			}
			$ext = $extension_upload;
			$_SESSION['titre']=$nom;
			$_SESSION['description']=$_POST['description'];
			$_SESSION['type']=$_POST['type'];
			$_SESSION['categorie']=$_POST['categorie'];
			$_SESSION['extension']=$ext;
			$_SESSION['id_user']=$_SESSION['id'];
			$_SESSION['date_upload']=$date_up;
			  
			$valider=new ModeleValidationMedia();
			$validation=$valider->valid_upload();

			$to = "projetcapture@gmail.com";
			$titre = $_SESSION['titre'].".".$ext;
			$headers = "Fichier : $titre -- Lien vers l'application : http://perso-cvtic.unilim.fr/DW02_2018/capture";
			$body = "Un nouveau fichier vient d'être uploader, merci de le valider ou de le refuser \n\n"; 
			$send = mail($to, $body, $headers);
			exit();
		}
		else { //Sinon (la fonction renvoie FALSE).
			if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {
				echo '<p>Echec de l\'upload !<p><br><br>';
			}
			else {
				$_SESSION['message'] = "<span style='color:red;font-weight:bold'>!! Echec de l'upload !!</span>";
			}
		}
	}
	else {
			if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {
				echo "<p>!! Votre fichier n'est pas au bon format !!<p><br><br>";
				echo '<p>!! Formats acc&eacute;pt&eacute;s : pdf / mp3 - ogg - wav / avi - mp4 - mkv - flv!!<p><br><br>';
			}
			else {
				$_SESSION['message'] = "<span style='color:red;font-weight:bold'>!! Votre fichier n'est pas au bon format !!</span><br><span>!! Formats acc&eacute;pt&eacute;s : pdf / mp3 - ogg - wav / avi - mp4 - mkv - flv!!</span>";
			}		
	}	
}
else {
	$_SESSION['message'] = "<span style='color:red;font-weight:bold'>!! Vous n'avez s&eacute;l&eacute;ctionn&eacute; aucun fichier !!</span>";
}

if ($_SERVER['HTTP_REFERER'] == "http://perso-cvtic.unilim.fr/DW02_2018/capture/view/accessibility/ajouter.php") {
?>
	    </body>
	</html>
<?php
}
?>