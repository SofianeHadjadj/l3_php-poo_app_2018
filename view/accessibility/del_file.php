<?php
session_start(); 
include('../../model/connexion_BDD.php');
include('../../model/ModeleFichiers.php');
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
<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
	<!--Conservation du confort de lecture-->
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php include('confortLecture.php');
			//on inclut le controleur qui permet de supprimer un fichier
			include ('../../controller/delfile.cont.php');
			echo "Le fichier ".$file_path." a bien ete detruit";
			echo '<br><br><button><a href="../accessibility/administration.php">Retour</a></button><br><br>';
		?>
	</body>
</html>