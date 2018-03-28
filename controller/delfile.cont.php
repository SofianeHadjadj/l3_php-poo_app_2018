<?php

session_start();
header("location:".$_SERVER['HTTP_REFERER']);

	include('../model/connexion_BDD.php');
	include('../model/ModeleFichiers.php');
	$file_name = $_POST["titre"].'.'.$_POST["extension"];
	$file_path = '../files/upload/'.$file_name;

	unlink($file_path);

	$idForDelete = intval($_POST["id"]);

	$_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; supprim&eacute;";

	//$requete2=$dbh->query("DELETE FROM valid_upload WHERE id = $id") or die;
	$supprimer=new ModeleValidationMedia();
	$suppression=$supprimer->deleteUpload($idForDelete);

?>