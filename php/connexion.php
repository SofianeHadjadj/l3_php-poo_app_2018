<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portail d'authentification</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <div id="authentification">
	<h2>Bienvenue sur l'application Capture, merci de vous authentifier.</h2>   
        <form id="formulaire" action="" method="post">
        <fieldset>
            <label for="ident">Identifiant </label> : <input class="text" type="text" name="ident" id="ident"/> <br><br>
            <label for="pass">Mot de passe</label> : <input class="text" type="password" name="pass" id="pass"/> <br><br>
            <button id="valider" type="submit">Valider</button>
        </fieldset>
        </form>
        <p>
            <a>Si vous n'avez pas encore de compte, veuillez cliquer sur le lien ci-dessous pour vous inscrire.</a> <br>
            <a href="inscription.php?module=1">S'inscrire</a>
        </p>
    </div>
<?php  
if (isset($_POST['ident']) AND isset($_POST['pass'])){
    // Sécurité
    $IDENT=$_POST['ident'];
    $PASS=$_POST['pass'];

        if (empty($_POST['ident']) || empty($_POST['pass'])){
            echo "Merci de compléter tous les champs";
            echo '<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';
        }
        else{ //On check le mot de passe et l'id
            $donnee=$connex->query("SELECT * FROM utilisateurs WHERE identifiant='$IDENT'");
            while($acces = $donnee->fetch()){
                if ($acces['mdp'] == $_POST['pass']) {
                    echo'<p>Vous êtes maintenant connecté!</p> <p>Cliquez <a href="accueil.php">ici</a> pour accéder à la page d accueil</p>';  
                    $nom=$acces['nom'];
                    $prenom=$acces['prenom'];
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                }
                else{ // Acces pas OK !
                    echo"<p>Une erreur s'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré n'est pas correct.</p><p>Cliquez <a href='./index.php'>ici</a>pour revenir à la page précédente</p>";
                }
            }
            $donnee->closeCursor();
        }
}

?>

</body>
</html>


