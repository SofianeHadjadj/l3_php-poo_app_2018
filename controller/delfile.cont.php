<?php

$file_name = $_POST["titre"].'.'.$_POST["extension"];
$file_path = 'upload/'.$file_name;

unlink($file_path);

$id = intval($_POST["id"]);

//$requete2=$dbh->query("DELETE FROM valid_upload WHERE id = $id") or die;
$supprimer=new ModeleValidationMedia();
$suppression=$supprimer->deleteUpload($id);

?>