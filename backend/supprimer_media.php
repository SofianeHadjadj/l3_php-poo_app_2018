<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
$quete = $dbh->query("SELECT * FROM fichiers");
echo "<h3>Média à desactiver/supprimer :</h3>";
while($desactivation = $quete->fetch()) {
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
        $quete2 = $dbh->query("SELECT * FROM fichiers WHERE id='$id'");
        while($fichier = $quete2->fetch()){
       
        $titre = $fichier['titre'];
        $description = $fichier['description'];
        $type = $fichier['type'];
        $categorie = $fichier['categorie'];
        $id_user = $fichier['id_user'];
        $date_upload = $fichier['date_upload'];
        $dbh->query("INSERT INTO valid_upload (titre, description, type, categorie, id_user, date_upload) VALUES('$titre', '$description', '$type', '$categorie', '$id_user', '$date_upload')");
        $dbh->query("DELETE FROM fichiers WHERE id='$id'");
        die('<META HTTP-equiv="refresh" content=0;URL=supprimer_media.php>');
        }
    }
    elseif($action == "supprimer") {
    $id = $_GET['id'];
    $dbh->query("DELETE FROM fichiers WHERE id='$id'");
    die('<META HTTP-equiv="refresh" content=0;URL=supprimer_media.php>');
    }
}
?>
