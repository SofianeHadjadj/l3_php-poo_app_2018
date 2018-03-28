<?php
session_start();
header("location:".$_SERVER['HTTP_REFERER']);

	include('../model/connexion_BDD.php');
	include('../model/ModeleFichiers.php');

	$_SESSION['id'] = intval($_POST['id']);
	$_SESSION['titre'] = $_POST['titre'];
	$_SESSION['description'] = $_POST['description'];
	$_SESSION['type'] = $_POST['type'];
	$_SESSION['categorie'] = $_POST['categorie'];
	$_SESSION['extension'] = $_POST['extension'];
	$_SESSION['id_user'] = intval($_POST['id_user']);
	$_SESSION['date_upload'] =$_POST['date_upload'];
	$_SESSION['statut'] = 1;
	$_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; enregistr&eacute;";


	$valider=new ModeleValidationMedia();
	$validation=$valider->validationMedia();

?>