<?php
session_start(); // On démarre la session 
include('../../model/connexion_BDD.php');
include('../../model/ModeleUtilisateurs.php');
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
include ('../../controller/cnx.cont.php');

echo '<p>Cliquez <a href="index.php">ici</a> pour revenir</p>';


?>

</body>
</html>


