<?php
session_start(); 
include('connexion_BDD.php');
include('ModeleFichiers.php');
header('refresh:2 url=view_files.php');
$id_user = $_SESSION['id'];

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
<html>
    <head>
        <meta charset="utf-8" />
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
        <?php include('confortLecture.php'); 

echo "<h4>Le fichier ".$_POST['titre']." a bien ete ajoute aux favoris</h4>";

$_SESSION['id_user']=$_POST['id_user'];
    $_SESSION['id_file']=$_POST['id_file'];
    $ajoutfav=new ModeleFichier();
    $favoris=$ajoutfav->favoris();

    /*$requete=$dbh->prepare('SELECT * FROM favoris WHERE id=?,id_user=?,id_file=?') or die;
    $requete=$dbh->prepare('INSERT INTO favoris (id,id_user,id_file) VALUES (null,:id_user,:id_file)') or die;
    $requete->execute(array(
    'id_user'=>$_POST['id_user'],
    'id_file'=>$_POST['id_file']
    ));
*/
    
?>
</body>
</html>