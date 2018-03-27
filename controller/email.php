<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
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

    $to = "sofiane.hadjadj.tic@gmail.com";
    $from = "Projet Capture";
    $headers = "From: $from";

    $body = "Un nouveau fichier vient d'être uploader, merci de le valider ou de le refuser :\n\n"; 

    $send = mail($to, $body, $headers);
    echo "Votre message a bien été envoyé";
  exit();

?>
</body>
</html>