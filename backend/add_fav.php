<?php
session_start(); 
include('connexion_BDD.php');
header('refresh:2 url=view_files.php');

echo "<h4>Le fichier ".$_POST['titre']." a bien ete ajoute aux favoris</h4>";


    $requete=$dbh->prepare('SELECT * FROM favoris WHERE id=?,id_user=?,id_file=?') or die;
    $requete=$dbh->prepare('INSERT INTO favoris (id,id_user,id_file) VALUES (null,:id_user,:id_file)') or die;
    $requete->execute(array(
    'id_user'=>$_POST['id_user'],
    'id_file'=>$_POST['id_file']
    ));

    
?>