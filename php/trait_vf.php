<?php
session_start(); 
include('connexion_BDD.php');

echo "<h4>Le fichier :</h4>";

echo $_POST['id']."<br>";
echo $_POST['titre']."<br>";
echo $_POST['description']."<br>";
echo $_POST['type']."<br>";
echo $_POST['categorie']."<br>";
echo $_POST['extension']."<br>";
echo $_POST['id_user']."<br>";
echo $_POST['date_upload']."<br>";

$id = intval($_POST['id']);
$id_user = intval($_POST['id_user']);
$statut = 1;


    $requete=$dbh->prepare('SELECT * FROM fichiers WHERE id=?,titre=?,description=?,type=?,categorie=?,extension=?,statut=?,id_user=?,date_upload=?') or die;
    $requete=$dbh->prepare('INSERT INTO fichiers (id,titre,description,type,categorie,extension,statut,id_user,date_upload) VALUES (:id,:titre,:description,:type,:categorie,:extension,:statut,:id_user,:date_upload)') or die;
    $requete->execute(array(
    'id'=>$id,
    'titre'=>$_POST['titre'],
    'description'=>$_POST['description'],
    'type'=>$_POST['type'],
    'categorie'=>$_POST['categorie'],
    'extension'=>$_POST['extension'],
    'statut'=>$statut,
    'id_user'=>$id_user,
    'date_upload'=>$_POST['date_upload']
    ));


    $requete2=$dbh->query("DELETE FROM valid_upload WHERE id = $id") or die;

    echo "<br>A bien ete enregistre";

?>