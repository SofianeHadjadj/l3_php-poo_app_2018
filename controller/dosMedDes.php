<?php
    $selection=new ModeleFichier();
    $select=$selection->select();
    while($desactivation = $select->fetch()) {
		echo "<div class='espA5'>";
		echo "<ul>";
		echo '<li>Titre: '.substr($desactivation['titre'], 0, 28);			
		echo '<li>Description : '.substr($desactivation['description'], 0, 21);			
		echo '<li>Type : '.$desactivation['type'];			
		echo '<li>Categorie : '.$desactivation['categorie'];			
		echo '<li>User id: '.$desactivation['id_user'];
		echo '<li>Date d\'upload : '.$desactivation['date_upload'];		
		echo "</ul>";
		echo "</div>";
		echo "<div class='espA5 espA5btn'>";            
?>
		<a href="index.php?action=desactiver&id=<?php echo $desactivation['id']; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-right:15px" onclick="return(confirm('Etes vous sûr de vouloir désactiver ce média ?'))">Désactiver </a>
        <a href="index.php?action=supprimer&idsuppr=<?php echo $desactivation['id']; ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-right:15px" onclick="return(confirm('Etes vous sûr de vouloir supprimer ce média ?'))">Supprimer </a>
<?php    
        echo "</div>";
    }
 
    if(isset($_GET['action']) AND isset($_GET['idsuppr'])) {
        $action = $_GET['action'];
        if($action == "supprimer") {
            $idsuppr = $_GET['idsuppr'];
            $_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; supprim&eacute;";
            $supprimerFile=new ModeleValidationMedia();
            $supprdesa=$supprimerFile->deleteDes($idsuppr);
        } 
    }
    elseif(isset($_GET['action']) AND isset($_GET['id']) OR isset($_GET['id'])) {
        $action = $_GET['action'];       
        if($action == "desactiver"){
            $id = $_GET['id'];
            $_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; d&eacute;sactiv&eacute;";
            $desa=new ModeleValidationMedia();
            $desactiver=$desa->desactiver($id);
        }
    }
?>