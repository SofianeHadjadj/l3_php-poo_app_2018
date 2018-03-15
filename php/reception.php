<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
if(isset($_FILES['mon_fichier']))
$date_up=date('Y-m-d');
$ext = '';
{ 
     
     //1. strrchr renvoie l'extension avec le point (« . »).
     //2. substr(chaine,1) ignore le premier caractère de chaine.
     //3. strtolower met l'extension en minuscules.
     $extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
     

     $dossier = 'upload/';
     $nom = $_POST['titre'];
     $fichier = "{$nom}.{$extension_upload}";
     if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier))
     {
          echo '<br><br>Upload effectu&eacute; avec succ&eacute;s !<br><br>';
          $ext = $extension_upload;
          $requete=$dbh->prepare('SELECT * FROM valid_upload WHERE id=?,titre=?,description=?,type=?,categorie=?,extension=?,id_user=?,date_upload=?') or die;
          $requete=$dbh->prepare('INSERT INTO valid_upload (id,titre,description,type,categorie,extension,id_user,date_upload) VALUES (null,:titre,:description,:type,:categorie,:extension,:id_user,:date_upload)') or die;
          $requete->execute(array(
          'titre'=>$_POST['titre'],
          'description'=>$_POST['description'],
          'type'=>$_POST['type'],
          'categorie'=>$_POST['categorie'],
          'extension'=>$ext,
          'id_user'=>$_SESSION['id'],
          'date_upload'=>$date_up
          ));
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !<br><br>';
     }
}

 ?>

<?php  
     echo '<br><br><button><a href="ajouter.php">Retour</a></button><br><br>';
?>