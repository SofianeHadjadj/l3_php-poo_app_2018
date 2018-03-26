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

$file_name = $_POST["titre"].'.'.$_POST["extension"];
$file_path = 'upload/'.$file_name;

unlink($file_path);

$id = intval($_POST["id"]);

//$requete2=$dbh->query("DELETE FROM valid_upload WHERE id = $id") or die;
$supprimer=new ModeleValidationMedia();
$suppression=$supprimer->deleteUpload($id);

echo "Le fichier ".$file_path." a bien ete detruit";

?>
</body>
</html>