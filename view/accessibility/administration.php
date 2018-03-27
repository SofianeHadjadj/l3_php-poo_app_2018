<?php
session_start();
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

 <html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Administration</title>
        <link href="style.css" rel="stylesheet">
        <link rel="stylesheet" media="screen" href="confort_lecture/style.css" />
    </head>
    <body  onload="<?php echo $_SESSION['confort']; if ($_SESSION['confort'] != "") {echo '(); ';}?><?php echo $_SESSION['police']; if ($_SESSION['police'] != "") {echo '(); ';}?>">
    <?php include('confortLecture.php');
        if ($_SESSION['statut'] == 1){
    ?>
        <h1>Espace administration</h1>
        <br><br>
        <B>Utilisateurs</B>
        <ul>
            <li><a href="validation.php">Valider un utilisateur </a></li>
            <li><a href="supprimer.php">Supprimer un utilisateur </a></li>
        </ul>    
        <br><br>
        <B>Contenu</B>
        <ul>
            <li><a href="ajouter.php">Ajouter un média </a></li>
            <li><a href="validation_fichiers.php">Valider un média </a></li>
            <li><a href="supprimer_media.php">Desactiver/Supprimer un média </a></li>
            <li><a href="view_files.php">Voir tous les fichiers actifs </a></li>
        </ul>
    <?php }
    else {
    ?>
    <h1>ERREUR</h1>
    <p>Vous n'êtes pas autorisé à accéder à cette page, cliquez <a href="index.php">ici</a> pour revenir</p>
    <?php
    }
    ?>    
    </body>
 </html>