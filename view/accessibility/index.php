<?php
session_start();
include('../../model/connexion_BDD.php');
include('../../model/ModeleUtilisateurs.php');
$id=$_SESSION['id'];
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
		<title>Accueil</title>
		<link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
	</head>
	<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
		<?php
			include('confortLecture.php');
			if (isset($id)) {
				$menu=new ModeleUtilisateur($id);
				$menuPersonnalise=$menu->afficheMenu();
				//Affiche un menu différent en fonction de l'utilisateur
				if ($_SESSION['statut'] == 1){
		?>
					<ul>
						<li class="active"><a href="index.php">Accueil </a></li>
						<li><a href="consulter.php?module=3">Consulter les livres </a></li>
						<li><a href="consulter.php?module=1">Consulter les vidéos </a></li>
						<li><a href="consulter.php?module=2">Consulter les documents audios </a></li>
						<li><a href="administration.php">Interface administration </a></li>
						<li><a href="logout.php">Déconnexion </a></li>
					</ul>    
		<?php
			    }
			    else {
		?>
					<ul>
						<li class="active"><a href="index.php">Accueil </a></li>
						<li><a href="ajouter.php">Ajouter un média </a></li>
						<li><a href="consulter.php?module=3">Consulter les livres </a></li>
						<li><a href="consulter.php?module=1">Consulter les vidéos </a></li>
						<li><a href="consulter.php?module=2">Consulter les documents audios </a></li>
						<li><a href="espace_membre.php">Mon espace perso </a></li>
						<li><a href="logout.php">Déconnexion </a></li>
					</ul> 
		<?php
				}
			}

			else {
		?>
				<ul>         
					<li class="active"><a href="index.php">Accueil </a></li>
					<li><a href="consulter.php?module=3">Consulter les livres </a></li>
					<li><a href="consulter.php?module=1">Consulter les vidéos </a></li>
					<li><a href="consulter.php?module=2">Consulter les documents audios </a></li>
					<li><a href="connexion.php">Connexion/inscription </a></li>
				</ul> 
		<?php
			}
            
        ?>
	</body>
</html>