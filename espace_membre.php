<?php
session_start(); 
include('connexion_BDD.php');
include('ModeleFichiers.php');
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
?>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Espace membre</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
<?php include('confortLecture.php'); 
$_SESSION['base'] = 'http://perso-cvtic.unilim.fr/DW02_2018/Capture/upload/';
if ($_SESSION['statut'] == 2){
    $fav=new ModeleFichier();
    $favoris=$fav->favorisMembre($id_user);
    
    $fichiers=new ModeleFichier();
    $fichiersMembre=$fichiers->fichiersMembre($id_user);
}
else {
    ?>
    <h1>ERREUR</h1>
    <p>Vous n'êtes pas autorisé à accéder à cette page, cliquez <a href="index.php">ici</a> pour revenir</p>
    <?php
    }
    ?>   
</body>
</html>