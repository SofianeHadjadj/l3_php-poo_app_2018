<?php
session_start(); 
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


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		<link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
		<script src="http://vjs.zencdn.net/c/video.js"></script>
	</head>
	<!--Conservation du confort de lecture sur la page-->
	<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
		<?php include('conservationConfortLecture.php'); 
			$nom = $_POST['titre'].".".$_POST['extension'];
			$lien = "../../files/upload/".$nom;
			$type = "audio/".$_POST['extension'];

		?>

		<div  style="margin-right: 30px">
			<br><br><br>
            <audio controls>
                <source src="<?php echo $lien;?>" type="audio/<?php echo $_POST['extension'];?>">
            </audio>
         </div>
		<br>
		<div style="width: 500px; border: 1px solid black;text-align: justify;padding: 50px">
			<?php echo $_POST['description'];  ?>
		</div>
		<br>
		<div>
			<a href="<?php echo $lien;  ?>" download="<?php echo $nom;  ?>"><button>T&eacute;l&eacute;charger le fichier</button></a>
		</div>
	</body>
</html>