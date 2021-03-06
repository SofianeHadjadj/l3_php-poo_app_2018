<?php
session_start(); // On démarre la session 
include('../../model/connexion_BDD.php');
include('../../model/ModeleUtilisateurs.php');
//Conservation du mode confort de lecture si celui ci existe
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
        <title>Supprimer un utilisateur</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php 
			include('confortLecture.php');
			//Verifie si l'utilisateur est bien un admin
			if ($_SESSION['statut'] == 1) {
				include('../../controller/deluser.cont.php'); 
			}
			//Sinon un message d'erreur apparait
			else {
        ?>
				<h1>ERREUR</h1>
				<p>Vous n'êtes pas autorisé à accéder à cette page, cliquez <a href="index.php">ici</a> pour revenir</p>
        <?php
			}
        ?>
	</body>
</html>