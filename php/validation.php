<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
$quete = $dbh->query("SELECT * FROM validation");
echo "<h3>Utilisateurs à valider :</h3>";
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
    echo '<a href="validation.php?action=accepter&id='.$validation['id'].'">Accepter </a>';
    echo '<a href="validation.php?action=refuser&id='.$validation['id'].'">Refuser</a>';
    echo '<br/>';
}
 
if(isset($_GET['action']) AND isset($_GET['id'])) {
    $action = $_GET['action'];
    if($action == "accepter"){
        $id = $_GET['id'];
        $quete2 = $dbh->query("SELECT * FROM validation WHERE id='$id'");
        while($utilisateurs = $quete2->fetch()){
       
        $nom = $utilisateurs['nom'];
        $prenom = $utilisateurs['prenom'];
        $identifiant = $utilisateurs['identifiant'];
        $mdp = $utilisateurs['mdp'];
        $mail = $utilisateurs['mail'];
        $dbh->query("INSERT INTO utilisateurs (identifiant, prenom, nom, mail, mdp) VALUES('$identifiant', '$prenom', '$nom', '$mail', '$mdp')");
        $dbh->query("DELETE FROM validation WHERE id='$id'");
        die('<META HTTP-equiv="refresh" content=0;URL=validation.php>');
        }
    }
    elseif($action == "refuser") {
    $id = $_GET['id'];
    $dbh->query("DELETE FROM validation WHERE id='$id'");
    }
}
?>
