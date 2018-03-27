<?php

echo $_POST['id']."<br>";
echo $_POST['titre']."<br>";
echo $_POST['description']."<br>";
echo $_POST['type']."<br>";
echo $_POST['categorie']."<br>";
echo $_POST['extension']."<br>";
echo $_POST['id_user']."<br>";
echo $_POST['date_upload']."<br>";

$_SESSION['id'] = intval($_POST['id']);
$_SESSION['titre'] = $_POST['titre'];
$_SESSION['description'] = $_POST['description'];
$_SESSION['type'] = $_POST['type'];
$_SESSION['categorie'] = $_POST['categorie'];
$_SESSION['extension'] = $_POST['extension'];
$_SESSION['id_user'] = intval($_POST['id_user']);
$_SESSION['date_upload'] =$_POST['date_upload'];
$_SESSION['statut'] = 1;


$valider=new ModeleValidationMedia();
$validation=$valider->validationMedia();

?>