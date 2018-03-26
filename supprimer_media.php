<?php
session_start(); // On démarre la session 
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
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Supprimer un media</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
<?php include('confortLecture.php'); 
if ($_SESSION['statut'] == 1){
    $selection=new ModeleFichier();
    $select=$selection->select();
    echo "<h1>Média à desactiver/supprimer :</h1>";
    while($desactivation = $select->fetch()) {
        echo 'Titre : ';
        echo $desactivation['titre'];
        echo '<br/>';
        echo ' Description : ';
        echo $desactivation['description'];
        echo '<br/>';
        echo ' Type : ';
        echo $desactivation['type'];
        echo '<br/>';
        echo ' Categorie : ';
        echo $desactivation['categorie'];
        echo '<br/>';
        echo ' Id user : ';
        echo $desactivation['id_user'];
        echo ' Date d\'upload : ';
        echo $desactivation['date_upload'];
        echo '<br/>';
        echo '<a href="supprimer_media.php?action=desactiver&id='.$desactivation['id'].'">Désactiver </a>';
        echo '<a href="supprimer_media.php?action=supprimer&id='.$desactivation['id'].'">Supprimer</a>';
        echo '<br/>';
    }
 
    if(isset($_GET['action']) AND isset($_GET['id'])) {
        $action = $_GET['action'];
        if($action == "desactiver"){
            $id = $_GET['id'];
            $desa=new ModeleValidationMedia();
            $desactiver=$desa->desactiver($id);
        }
        elseif($action == "supprimer") {
            $id = $_GET['id'];
            $supprimer=new ModeleFichier();
            $supprdesa=$supprimer->delete($id);
        }
    }
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
