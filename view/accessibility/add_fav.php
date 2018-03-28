<?php
session_start(); 
include('../../model/connexion_BDD.php');
include('../../model/ModeleFichiers.php');
//permet de rafraichir la page
header('refresh:2 url=view_files.php');
$id_user = $_SESSION['id'];

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
	<!-- Suite conservation confort de lecture-->
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
		<?php include('confortLecture.php'); 
			echo "<h4>Le fichier ".$_POST['titre']." a bien ete ajoute aux favoris</h4>";
			//Lien vers la partie d'ajout de favoris dans le controleur
			include('../../controller/addfav.cont.php');
		?>
	</body>
</html>