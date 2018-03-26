<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
include('ModeleUtilisateurs.php');
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
        <title>Valider un utilisateur</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php include('confortLecture.php'); 
if ($_SESSION['statut'] == 1){
    
    $validation=new ModeleValidation();
    $valider=$validation->valider();
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