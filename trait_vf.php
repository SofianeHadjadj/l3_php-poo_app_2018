<?php
session_start(); 
include('connexion_BDD.php');
include('ModeleFichiers.php');

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
<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
<?php include('confortLecture.php'); 

echo "<h4>Le fichier :</h4>";

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
</body>
</html>