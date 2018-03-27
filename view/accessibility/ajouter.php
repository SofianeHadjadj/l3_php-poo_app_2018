<?php 
session_start(); // On démarre la session
include('confortLecture.php'); 
//include('connexion_BDD.php');
include("../../files/upload.php");
$id=$_SESSION['id'];
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title> Ajouter un fichier</title>
  <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />

</head>
<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
</br></br>
<?php
if ($_SESSION['statut'] >= 1) {
?>
 <a href="list.php">Voir la liste des fichiers envoyés</a>
 <?php
}
else {

}
?>  
</body>
</html>