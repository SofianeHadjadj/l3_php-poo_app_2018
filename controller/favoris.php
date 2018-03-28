<?php
	session_start(); 

	if ($_POST['type'] == "vid") {
		header('location:../view/design/index.php#videos');
	}

	else if ($_POST['type'] == "aud") {
		header('location:../view/design/index.php#audios');
	}

	else if ($_POST['type'] == "eb") {
		header('location:../view/design/index.php#ebook');
	}

	else {
		header('location:../view/design/index.php');
	}

	include('../model/connexion_BDD.php');
	include('../model/ModeleFichiers.php');

	$id_user = $_SESSION['id'];
	$_SESSION['id_user']=$_POST['id_user'];
	$_SESSION['id_file']=$_POST['id_file'];
	$ajoutfav=new ModeleFichier();
	$favoris=$ajoutfav->favoris(); 
?>