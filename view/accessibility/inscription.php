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

$module=$_GET['module'];
?>

<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
	<!--Conservation du confort de lecture sur la page-->
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php include('confortLecture.php'); ?>
        <div id="inscription">
            <h1>Formulaire d'inscription</h1>

            <p>Bienvenue sur la page d'inscription du site CapTure</p>
		<?php
			if ($module==1){
				echo "<p>Veuillez renseigner les champs ci-dessous</p>";          
		?>
				<form name="inscription" method="POST" action="inscription.php?module=2">
					<fieldset>
						<legend>Remplir les champs ci dessous</legend>
						<label for="nom" class="float">Nom :</label> <input id="nom" type="text" name="nom"/><br /><br>
						<label for="prenom" class="float">Prénom :</label> <input id="prenom" type="text" name="prenom"/> <br /><br>                    
						<label for="identifiant" class="float">Identifiant :</label> <input id="identifiant" type="text" name="identifiant"/><br /><br>
						<label for="mdp" class="float">Mot de passe :</label> <input id="mdp" type="password" name="mdp"/><br /><br>
						<label for="mdp_verif" class="float">Mot de passe (vérification) :</label> <input id="mdp_verif" type="password" name="mdp_verif"/><br /><br>
						<label for="mail" class="float">Mail :</label> <input id="mail" type="text" name="mail"/> <br /><br>
						<div class="center"><input type="submit" value="Valider" /></div>
					</fieldset>

				</form>
		<?php  
			} 
			//Inclut le controleur qui permet l'inscription
			include ('../../controller/verinsc.cont.php');
		?>
		</div>
	</body>
</html>
