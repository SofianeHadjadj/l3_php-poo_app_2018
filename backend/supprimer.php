<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
$quete = $dbh->query("SELECT * FROM utilisateurs");
echo "<h3>Utilisateurs à supprimer :</h3>";
while($validation = $quete->fetch()) {
    echo 'Nom: ';
    echo $validation['nom'];
    echo '<br/>';
    echo ' Prenom : ';
    echo $validation['prenom'];
    echo '<br/>';
    echo ' Identifiant: ';
    echo $validation['identifiant'];
    echo '<br/>';
    echo ' Mot de passe: ';
    echo $validation['mdp'];
    echo '<br/>';
    echo ' E-mail: ';
    echo $validation['mail'];
    echo '<br/>';
    echo '<a href="supprimer.php?action=supprimer&id='.$validation['id'].'">Supprimer </a>';
    echo '<br/><br/>';
}
 
if(isset($_GET['action']) AND isset($_GET['id'])) {
    $action = $_GET['action'];
    if($action == "supprimer"){
    $id = $_GET['id'];
    $dbh->query("DELETE FROM utilisateurs WHERE id='$id'");
    die('<META HTTP-equiv="refresh" content=0;URL=supprimer.php>');
    }
}
?>
