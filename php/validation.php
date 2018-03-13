<?php
mysql_connect("localhost", "DW02_2018", "7iqpmyah");
mysql_select_db("DW02_2018");
$quete = mysql_query("SELECT * FROM validation");
while($validation = mysql_fetch_array($quete)) {
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
        $quete2 = mysql_query("SELECT * FROM validation WHERE id='$id'");
        $utilisateurs = mysql_fetch_array($quete2);
        $nom = $utilisateurs['nom'];
        $prenom = $utilisateurs['prenom'];
        $identifiant = $utilisateurs['identifiant'];
        $mdp = $utilisateurs['mdp'];
        $mail = $utilisateurs['mail'];
        mysql_query("INSERT INTO utilisateurs (identifiant, prenom, nom, mail, mdp) VALUES('$identifiant', '$prenom', '$nom', '$mail', '$mdp')");
        mysql_query("DELETE FROM validation WHERE id='$id'");
    }
    elseif($action == "refuser") {
    $id = $_GET['id'];
    mysql_query("DELETE FROM validation WHERE id='$id'");
    }
}
?>
