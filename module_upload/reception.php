<?php
if(isset($_FILES['mon_fichier']))
{ 
	
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($_FILES['mon_fichier']['name'], '.')  ,1)  );
	

     $dossier = 'upload/';
     //$nom = md5(uniqid(rand(), true));
     $nom = $_POST['titre'];
     $fichier = "{$nom}.{$extension_upload}";
     if(move_uploaded_file($_FILES['mon_fichier']['tmp_name'], $dossier . $fichier))
     {
          echo '<br><br>Upload effectué avec succès !<br><br>';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !<br><br>';
     }
/*
     if(isset($_POST['description']))
     {
          $description = $_POST['description'];

          $monfichier = fopen('Desc__'.$nom.'.txt', 'a+');

          fputs($monfichier, $description);

          fclose($monfichier);

          //$vartest = realpath(dirname(dossier)).DIRECTORY_SEPARATOR.$monfichier;  
          //rename("C:\wamp64\www\upload".DIRECTORY_SEPARATOR.$monfichier, "C:\wamp64\www\upload\dossier".DIRECTORY_SEPARATOR.$monfichier); 
          //$nom_fichier = realpath(dirname(dossier)).DIRECTORY_SEPARATOR.$monfichier; 
     }
*/
}


 ?>

<?php  
	echo '<br><br><button><a href="index.php">Retour</a></button><br><br>';
?>