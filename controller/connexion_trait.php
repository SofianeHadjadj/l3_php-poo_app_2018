<?php 

	session_start();
	header('location:../view/design/index.php');
	include('../model/connexion_BDD.php');
	include('../model/ModeleUtilisateurs.php');

	$id=$_SESSION['id'];

	include ('cnx.cont.php');

?>