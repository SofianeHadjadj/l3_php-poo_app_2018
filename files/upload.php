<?php
//session_start(); // On démarre la session 
include('connexion_BDD.php');
echo date('Y-m-d');
//echo $_SESSION['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Ajouter un fichier</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<?php
if ($_SESSION['statut'] >= 1) {
?>
<h1>Envoyer un fichier</h1>
<form method="post" action="../../files/reception.php" enctype="multipart/form-data">
    <fieldset>
     <legend>Envoyer un fichier</legend>
     <label for="mon_fichier">Fichier (tous formats | max. 1 Go) :</label><br />
     <input type="file" name="mon_fichier" id="mon_fichier" required/><br /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" placeholder="Titre du fichier" id="titre" maxlength="50" required/><br /><br />
     <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
     <textarea name="description" id="description" maxlength="255" required></textarea><br /><br />
     Vidéo<input type="radio" name="type" value="vid" id="vid" onchange="selVid()"/>Audio<input type="radio" name="type" value="aud" id="aud" onchange="selAud()"/>E-book<input type="radio" name="type" value="eb" id="eb" onchange="selEb()"/><br>

     <div class="form-inline" id="radioDPRT">
     Cinéma<input type="radio" name="categorie" value="cin" disabled/>Documentaire<input type="radio" name="categorie" value="doc" disabled/>Oeuvre commentée<input type="radio" name="categorie" value="oc" disabled/>
     </div>

     <input type="submit" name="submit" value="Envoyer" />
    </fieldset>
</form>

<script type="text/javascript">
    function selVid() {
        if(document.getElementById('vid').value == "vid"){
            document.getElementById('radioDPRT').innerHTML = 'Cinéma<input type="radio" name="categorie" value="cin"/>Documentaire<input type="radio" name="categorie" value="doc"/>Oeuvre commentée<input type="radio" name="categorie" value="oc"/>';
        }
    }
    function selAud() {
        if(document.getElementById('aud').value == "aud"){
            document.getElementById('radioDPRT').innerHTML = 'Cinéma<input type="radio" name="categorie" value="cin" disabled/>Documentaire<input type="radio" name="categorie" value="doc" disabled/>Oeuvre commentée<input type="radio" name="categorie" value="oc" disabled/>';
        }
    }
    function selEb() {
        if(document.getElementById('eb').value == "eb"){
            document.getElementById('radioDPRT').innerHTML = 'Cinéma<input type="radio" name="categorie" value="cin" disabled/>Documentaire<input type="radio" name="categorie" value="doc" disabled/>Oeuvre commentée<input type="radio" name="categorie" value="oc" disabled/>';
        }
    }        
</script>
<?php
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