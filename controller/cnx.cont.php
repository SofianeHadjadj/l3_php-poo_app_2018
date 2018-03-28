<?php 

	if (isset($_POST['ident']) AND isset($_POST['pass'])){
		$_SESSION['IDENT']=$_POST['ident'];
		$_SESSION['PASS']=$_POST['pass'];
			if (empty($_SESSION['IDENT']) || empty($_SESSION['PASS'])){
				echo "<span class='hideIfDesign'>Merci de compléter tous les champs</span>";
				echo '<p class="hideIfDesign">Cliquez <a href="index.php">ici</a> pour revenir</p>';
			}
			else{ //On check le mot de passe et l'id
				$connexion=new ModeleUtilisateur($id);
				$connexionUtil=$connexion->connexion();
			}        
	}

?>