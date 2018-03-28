<?php
    $selection=new ModeleFichier();
    $select=$selection->select();

    while($desactivation = $select->fetch()) {
        echo 'Titre : ';
        echo $desactivation['titre'];
        echo '<br/>';
        echo ' Description : ';
        echo $desactivation['description'];
        echo '<br/>';
        echo ' Type : ';
        echo $desactivation['type'];
        echo '<br/>';
        echo ' Categorie : ';
        echo $desactivation['categorie'];
        echo '<br/>';
        echo ' Id user : ';
        echo $desactivation['id_user'];
        echo ' Date d\'upload : ';
        echo $desactivation['date_upload'];
        echo '<br/>';
        ?>
			<a href="supprimer_media.php?action=desactiver&id=<?php echo $desactivation['id'] ?>" onclick="return(confirm('Etes vous sûr de vouloir désactiver ce média?'))">Désactiver </a>
			<a href="supprimer_media.php?action=supprimer&id=<?php echo $desactivation['id'] ?>" onclick="return(confirm('Etes vous sûr de vouloir supprimer ce média?'))">Supprimer </a>
        <?php        
			echo '<br/>';
    }
 
    if(isset($_GET['action']) AND isset($_GET['id'])) {
        $action = $_GET['action'];
        if($action == "desactiver"){
            $id = $_GET['id'];
            $desa=new ModeleValidationMedia();
            $desactiver=$desa->desactiver($id);
        }
        elseif($action == "supprimer") {
            $id = $_GET['id'];
            $supprimer=new ModeleFichier();
            $supprdesa=$supprimer->delete($id);
        }
    }

?>