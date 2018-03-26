<?php
session_start(); 
include('connexion_BDD.php');
include('ModeleFichiers.php');
$id_user = $_SESSION['id'];
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
        <title>Valider un fichier</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
    <?php include('confortLecture.php'); 
    $count =0;
    if ($_SESSION['statut'] == 1){
    $fichiersVal=new ModeleValidationMedia();
    $validation=$fichiersVal->validerMedia();

	echo "<h1>Fichiers a valider</h1>";
	while ($donnees = $validation->fetch()) {

		$count++;

		echo "___________________<br>";

		?>

	    <form method="post" action="trait_vf.php" style="display: inline-block">
	      id : <input type="hidden" name="id" value="<?php echo $donnees["id"];?>"><?php echo $donnees["id"];?><br>
	      Titre : <input type="hidden" name="titre" value="<?php echo $donnees["titre"];?>"><?php echo $donnees["titre"];?><br>
	      Description : <input type="hidden" name="description" value="<?php echo $donnees["description"];?>"><?php echo $donnees["description"];?><br>
	      Type : <input type="hidden" name="type" value="<?php echo $donnees["type"];?>"><?php echo $donnees["type"];?><br>
	      Categorie : <input type="hidden" name="categorie" value="<?php echo $donnees["categorie"];?>"><?php echo $donnees["categorie"];?><br>
	      Extension : <input type="hidden" name="extension" value="<?php echo $donnees["extension"];?>"><?php echo $donnees["extension"];?><br>
	      Id user : <input type="hidden" name="id_user" value="<?php echo $donnees["id_user"];?>"><?php echo $donnees["id_user"];?><br>
	      Date d'upload : <input type="hidden" name="date_upload" value="<?php echo $donnees["date_upload"];?>"><?php echo $donnees["date_upload"];?><br><br>

	      <input type="submit" value="Valider">
	      
	    </form>
	    <form method="post" action="del_file.php" style="display: inline-block;margin-left: -200px">
	    	<input type="hidden" name="id" value="<?php echo $donnees["id"];?>">
	    	<input type="hidden" name="titre" value="<?php echo $donnees["titre"];?>">
	    	<input type="hidden" name="extension" value="<?php echo $donnees["extension"];?>">
	    	<input type="submit" value="supprimer">
	    </form>

		<?php

	    	//echo $count;
		echo "<br><br>___________________<br>";
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