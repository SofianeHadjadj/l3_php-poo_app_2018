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
		<title></title>
		<link href="http://vjs.zencdn.net/c/video-js.css" rel="stylesheet">
		<link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
		<script src="http://vjs.zencdn.net/c/video.js"></script>
	</head>
	<!--Conservation du confort de lecture sur la page-->
	<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
		<?php include('confortLecture.php'); 
			$nom = $_POST['titre'].".".$_POST['extension'];
			$lien = "../../files/upload/".$nom;
			$type = "video/".$_POST['extension'];

		?>

		<div>
			<video width="600" controls>
				<source src="<?php echo $lien;  ?>" type="<?php if ($_POST['extension'] == "flv") {echo "video/x-flv";} else if ($_POST['extension'] == "mkv") {echo "video/webm";} else {echo $type;}   ?>" />
			</video>		
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