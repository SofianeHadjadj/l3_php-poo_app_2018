<?php
session_start(); 
//header('refresh:2 url=index.php');

include('../../model/connexion_BDD.php');
include('../../model/ModeleFichiers.php');

$id_user = $_SESSION['id'];

?>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        
<?php 

echo "<h4>Le fichier ".$_POST['titre']." a bien ete ajoute aux favoris</h4>";

include('../../controller/addfav.cont.php');
    
?>
</body>
</html>