<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
include('ModeleUtilisateurs.php');
$id=$_SESSION['id'];
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
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Portail d'authentification</title>
    <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
</head>

<body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">

<?php include('confortLecture.php'); ?>

    <div id="authentification">
        <?php
        if (isset($id)) {
        ?>
        <p>Vous êtes bien connecté à l'application Capture</p>
        <a href="logout.php">Deconnexion</a>
        <?php
        }
        else{
        ?>
	<h1>Bienvenue sur l'application Capture, merci de vous authentifier.</h1>   
        <form id="formulaire" action="" method="post"> 
        <fieldset>
            <legend>Remplir les champs ci dessous</legend>
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
        }
if (isset($_POST['ident']) AND isset($_POST['pass'])){
    // Sécurité
    /*$IDENT=$_POST['ident'];
    $PASS=$_POST['pass'];

        if (empty($_POST['ident']) || empty($_POST['pass'])){
            echo "Merci de compléter tous les champs";
            echo '<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';
        }
        else{ //On check le mot de passe et l'id
            $donnee=$dbh->query("SELECT * FROM utilisateurs WHERE identifiant='$IDENT'");
            while($acces = $donnee->fetch()){
                if ($acces['mdp'] == $_POST['pass']) {
                    echo'<p>Vous êtes maintenant connecté !</p>';  
                    $nom=$acces['nom'];
                    $prenom=$acces['prenom'];
                    $id=$acces['id'];
                    $_SESSION['nom'] = $nom;
                    $_SESSION['prenom'] = $prenom;
                    $_SESSION['id'] = $id;
                }
                else{ // Acces pas OK !
                    echo"<p>Une erreur s'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré n'est pas correct.</p><p>Cliquez <a href='./index.php'>ici</a>pour revenir à la page précédente</p>";
                }
                
            }
            $donnee->closeCursor();
        }*/

    $_SESSION['IDENT']=$_POST['ident'];
    $_SESSION['PASS']=$_POST['pass'];

        if (empty($_SESSION['IDENT']) || empty($_SESSION['PASS'])){
            echo "Merci de compléter tous les champs";
            echo '<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';
        }
        else{ //On check le mot de passe et l'id
            $connexion=new ModeleUtilisateur($id);
            $connexionUtil=$connexion->connexion();
        }        
}
echo '<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

?>

</body>
</html>


