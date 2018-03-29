<?php
/**
 * Description of ModeleFichiers
 *
 * @author Groupe DW02
 */
class ModeleFichier extends db {
    
    public function voirFichiers() {
        $sql="SELECT * FROM fichiers WHERE statut = 1";
        $result=$this->connect()->query($sql);
        $result->execute();
        return $result;
    }

    public function select() {
        $sql = "SELECT * FROM fichiers";
        $result=$this->connect()->query($sql);
        $result->execute();
        return $result;
    }


    public function delete($id) {
        $sql = "DELETE FROM fichiers WHERE id='$id'";
        $result=$this->connect()->query($sql);
        $result->execute();
        die('<META HTTP-equiv="refresh" content=0;URL=index.php>');
    }


    public function viewCarousel1() {
        $sql = 'SELECT * FROM fichiers WHERE type = "vid" ORDER BY id DESC LIMIT 1';
        $requete=$this->connect()->query($sql);
        $requete->execute();
        while ($data = $requete->fetch()) {
            echo "<h4>Titre</h4>";
            echo "<p>".$data['titre']."</p>";
            echo "<h4>Description</h4>";
            echo "<p style='text-align: justify;'>".$data['description']."</p>";

            $sql2 = 'SELECT * FROM utilisateurs WHERE id="'.$data['id_user'].'"';
            $requete2=$this->connect()->query($sql2);
            $requete2->execute();
            while ($data2 = $requete2->fetch()) {
                echo "<h4>Uploader</h4>";
                echo "<p style='display: inline-block;'>".$data2['nom']." ".$data2['prenom']."</p>";               
            }
            $requete2->closeCursor();
            echo '<form method="post" action="">
                        <input type="hidden" name="type" value="'.$data['type'].'">
                        <input type="hidden" name="titre" value="'.$data['titre'].'">
                        <input type="hidden" name="description" value="'.$data['description'].'">
                        <input type="hidden" name="extension" value="'.$data['extension'].'">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" style="float: right; margin-right: 20px;">
                            <i class="material-icons" role="presentation">input</i>
                            <span class="visuallyhidden">View</span>
                        </button>  
                  </form>';             
        }
    }


    public function viewCarousel2() {
        $sql = 'SELECT * FROM fichiers WHERE type = "aud" ORDER BY id DESC LIMIT 1';
        $requete=$this->connect()->query($sql);
        $requete->execute();
        while ($data = $requete->fetch()) {
            echo "<h4>Titre</h4>";
            echo "<p>".$data['titre']."</p>";
            echo "<h4>Description</h4>";
            echo "<p style='text-align: justify;'>".$data['description']."</p>";

            $sql2 = 'SELECT * FROM utilisateurs WHERE id="'.$data['id_user'].'"';
            $requete2=$this->connect()->query($sql2);
            $requete2->execute();
            while ($data2 = $requete2->fetch()) {
                echo "<h4>Uploader</h4>";
                echo "<p style='display: inline-block;'>".$data2['nom']." ".$data2['prenom']."</p>";
            }
            $requete2->closeCursor();
            echo '<form method="post" action="">
                        <input type="hidden" name="type" value="'.$data['type'].'">
                        <input type="hidden" name="titre" value="'.$data['titre'].'">
                        <input type="hidden" name="description" value="'.$data['description'].'">
                        <input type="hidden" name="extension" value="'.$data['extension'].'">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" style="float: right; margin-right: 20px;">
                            <i class="material-icons" role="presentation">input</i>
                            <span class="visuallyhidden">View</span>
                        </button>  
                  </form>'; 
        }
    } 


    public function viewCarousel3() {
        $sql = 'SELECT * FROM fichiers WHERE type = "eb" ORDER BY id DESC LIMIT 1';
        $requete=$this->connect()->query($sql);
        $requete->execute();
        while ($data = $requete->fetch()) {
            echo "<h4>Titre</h4>";
            echo "<p>".$data['titre']."</p>";
            echo "<h4>Description</h4>";
            echo "<p style='text-align: justify;'>".$data['description']."</p>";

            $sql2 = 'SELECT * FROM utilisateurs WHERE id="'.$data['id_user'].'"';
            $requete2=$this->connect()->query($sql2);
            $requete2->execute();
            while ($data2 = $requete2->fetch()) {
                echo "<h4>Uploader</h4>";
                echo "<p style='display: inline-block;'>".$data2['nom']." ".$data2['prenom']."</p>";
            }
            $requete2->closeCursor();
            echo '<form method="post" action="">
                        <input type="hidden" name="type" value="'.$data['type'].'">
                        <input type="hidden" name="titre" value="'.$data['titre'].'">
                        <input type="hidden" name="description" value="'.$data['description'].'">
                        <input type="hidden" name="extension" value="'.$data['extension'].'">
                        <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-shadow--4dp mdl-color--accent" style="float: right; margin-right: 20px;">
                            <i class="material-icons" role="presentation">input</i>
                            <span class="visuallyhidden">View</span>
                        </button>  
                  </form>'; 
        }
    }       
   

    public function favoris() {
    	$_SESSION['message'] = "Le fichier a bien &eacute;t&eacute; ajout&eacute; aux favoris";
        $sql='SELECT * FROM favoris WHERE id=?,id_user=?,id_file=?';
        $result=$this->connect()->prepare($sql) or die;
        $sql='INSERT INTO favoris (id,id_user,id_file) VALUES (null,:id_user,:id_file)';
        $result=$this->connect()->prepare($sql) or die;
        $result->execute(array(
            'id_user'=>$_SESSION['id_user'],
            'id_file'=>$_SESSION['id_file']
        ));
    }

    public function fichiersMembre($id_user) {
        $sql = "SELECT * FROM fichiers WHERE id_user = $id_user";
        $result=$this->connect()->query($sql);
        $result->execute();
        echo "<h1>Mes fichiers uploades</h1>";
        while ($donnees = $result->fetch()) {
            if ($donnees["statut"] == 1) {
                echo "<strong>id :</strong> ".$donnees["id"]." ";
                echo "<strong>Titre :</strong> ".$donnees["titre"]." ";
                echo "<strong>Description :</strong> ".$donnees["description"]." ";
                echo "<strong>Lien vers le fichier :</strong>  <a href='".$_SESSION['base'].$donnees["titre"].".".$donnees["extension"]."'>Lien</a><br><br>";
            }
        }
    }

    public function favorisMembre($id_user) {
        $sql = "SELECT * FROM fichiers INNER JOIN favoris WHERE favoris.id_user = $id_user AND favoris.id_file = fichiers.id";
        $result=$this->connect()->query($sql);
        $result->execute();
        echo "<h1>Mes favoris</h1>";
        while ($data = $result->fetch()) {
            if ($data["statut"] == 1) {
                echo "<strong>Titre :</strong> ".$data["titre"]." ";
                echo "<strong>Description :</strong> ".$data["description"]." ";
                echo "<strong>Lien vers le fichier :</strong>  <a href='".$_SESSION['base'].$data["titre"].".".$data["extension"]."'>Lien</a><br><br>";
            }
        }
        $result->closeCursor();
    }

    public function fichiersMDesign($id_user) {
        $sql = "SELECT * FROM fichiers WHERE id_user = $id_user";
        $result=$this->connect()->query($sql);
        $result->execute();
        while ($donnees = $result->fetch()) {
            echo "<li>";
            echo $donnees["titre"]." ";
            if ($donnees["statut"] == 1) {
                echo "<span style='color:#00AE11'>actif</span>";
            }
            else {
                echo "<span style='color:#FA2014'>inactif</span>";
            }
            echo "</li>";

        }
    }

    // Favoris pour la partie Design = Vidéos

    public function favDesVid($id_user) {
        $sql = "SELECT * FROM fichiers INNER JOIN favoris WHERE favoris.id_user = $id_user AND favoris.id_file = fichiers.id";
        $result=$this->connect()->query($sql);
        $result->execute();
        while ($data = $result->fetch()) {
            if ($data['type'] == "vid") {
                echo "<li style='margin-bottom:10px;'>";
                echo $data["titre"]." ";
                if ($data["statut"] == 1) {
                    echo "<span style='color:#00AE11'>actif</span>
                        <form method='post' action='' style='display:inline; margin-left:15px'>
                            <input type='hidden' name='type' value='".$data['type']."'>
                            <input type='hidden' name='titre' value='".$data['titre']."'>
                            <input type='hidden' name='description' value='".$data['description']."'>
                            <input type='hidden' name='extension' value='".$data['extension']."'>
                            <button type='submit' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>
                                Voir
                            </button>
                        </form>";
                }
                else {
                    echo "<span style='color:#FA2014'>inactif</span>";
                }
                echo "</li>";
            }
        }
        $result->closeCursor();
    }

    // Favoris pour la partie Design = Audios

    public function favDesAud($id_user) {
        $sql = "SELECT * FROM fichiers INNER JOIN favoris WHERE favoris.id_user = $id_user AND favoris.id_file = fichiers.id";
        $result=$this->connect()->query($sql);
        $result->execute();
        while ($data = $result->fetch()) {
            if ($data['type'] == "aud") {
                echo "<li style='margin-bottom:10px;'>";
                echo $data["titre"]." ";
                if ($data["statut"] == 1) {
                    echo "<span style='color:#00AE11'>actif</span>
                        <form method='post' action='' style='display:inline; margin-left:15px'>
                            <input type='hidden' name='type' value='".$data['type']."'>
                            <input type='hidden' name='titre' value='".$data['titre']."'>
                            <input type='hidden' name='description' value='".$data['description']."'>
                            <input type='hidden' name='extension' value='".$data['extension']."'>
                            <button type='submit' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>
                                Voir
                            </button>
                        </form>";
                }
                else {
                    echo "<span style='color:#FA2014'>inactif</span>";
                }
                echo "</li>";
            }
        }
        $result->closeCursor();
    }

    // Favoris pour la partie Design = E-Books

    public function favDesEb($id_user) {
        $sql = "SELECT * FROM fichiers INNER JOIN favoris WHERE favoris.id_user = $id_user AND favoris.id_file = fichiers.id";
        $result=$this->connect()->query($sql);
        $result->execute();
        while ($data = $result->fetch()) {
            if ($data['type'] == "eb") {
                echo "<li style='margin-bottom:10px;'>";
                echo $data["titre"]." ";
                if ($data["statut"] == 1) {
                    echo "<span style='color:#00AE11'>actif</span>
                        <form method='post' action='' style='display:inline; margin-left:15px'>
                            <input type='hidden' name='type' value='".$data['type']."'>
                            <input type='hidden' name='titre' value='".$data['titre']."'>
                            <input type='hidden' name='description' value='".$data['description']."'>
                            <input type='hidden' name='extension' value='".$data['extension']."'>
                            <button type='submit' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored'>
                                Voir
                            </button>
                        </form>";
                }
                else {
                    echo "<span style='color:#FA2014'>inactif</span>";
                }
                echo "</li>";
            }
        }
        $result->closeCursor();
    }

}

class ModeleValidationMedia extends ModeleFichier {

    public function deleteUpload($id) {
        $sql = "DELETE FROM valid_upload WHERE id = '".$id."'";
        $result=$this->connect()->query($sql) or die;
        $result->execute();
    }

    public function validerMedia() {
        $sql = "SELECT * FROM valid_upload";
        $result=$this->connect()->query($sql);
        $result->execute();
        return $result;
    }

    public function valid_upload() {
        $sql='SELECT * FROM valid_upload WHERE id=?,titre=?,description=?,type=?,categorie=?,extension=?,id_user=?,date_upload=?';
        $result=$this->connect()->prepare($sql) or die;
          $sql='INSERT INTO valid_upload (id,titre,description,type,categorie,extension,id_user,date_upload) VALUES (null,:titre,:description,:type,:categorie,:extension,:id_user,:date_upload)';
          $result=$this->connect()->prepare($sql) or die;
          $result->execute(array(
          'titre'=>$_SESSION['titre'],
          'description'=>$_SESSION['description'],
          'type'=>$_SESSION['type'],
          'categorie'=>$_SESSION['categorie'],
          'extension'=>$_SESSION['extension'],
          'id_user'=>$_SESSION['id_user'],
          'date_upload'=>$_SESSION['date_upload']
          ));
    }

    public function validationMedia() {
        $sql = "SELECT * FROM fichiers WHERE id=?,titre=?,description=?,type=?,categorie=?,extension=?,statut=?,id_user=?,date_upload=?";
        $result=$this->connect()->prepare($sql) or die;
        $sql2= "INSERT INTO fichiers (id,titre,description,type,categorie,extension,statut,id_user,date_upload) VALUES (:id,:titre,:description,:type,:categorie,:extension,:statut,:id_user,:date_upload)";
        $result2=$this->connect()->prepare($sql2) or die;
        $result2->execute(array(
            'id'=>$_SESSION['id'],
            'titre'=>$_SESSION['titre'],
            'description'=>$_SESSION['description'],
            'type'=>$_SESSION['type'],
            'categorie'=>$_SESSION['categorie'],
            'extension'=>$_SESSION['extension'],
            'statut'=>$_SESSION['statut'],
            'id_user'=>$_SESSION['id_user'],
            'date_upload'=>$_SESSION['date_upload']
        ));

        $sql = "DELETE FROM valid_upload WHERE id = '".$_SESSION['id']."'";
        $result=$this->connect()->query($sql) or die;
        $result->execute();
        echo "<br>A bien ete enregistre";
    }

    public function desactiver($id) {
                $sql2 = "SELECT * FROM fichiers WHERE id='".$id."'";
                $result2=$this->connect()->query($sql2);
                $result2->execute();
                while($fichier = $result2->fetch()){
                    $titre = $fichier['titre'];
                    $description = $fichier['description'];
                    $type = $fichier['type'];
                    $categorie = $fichier['categorie'];
                    $extension = $fichier['extension'];
                    $id_user = $fichier['id_user'];
                    $date_upload = $fichier['date_upload'];
                    $dbh = "INSERT INTO valid_upload (titre, description, type, categorie, extension, id_user, date_upload) VALUES('$titre', '$description', '$type', '$categorie', '$extension', '$id_user', '$date_upload')";
                    $result3=$this->connect()->query($dbh);
                    $supprimer=$this->delete($id);
                }
        }
        
    public function deleteDes($id) {
        $sql = "DELETE FROM fichiers WHERE id='$id'";
        $result=$this->connect()->query($sql);
        $result->execute();
        die('<META HTTP-equiv="refresh" content=0;URL=index.php>');
    } 

    public function suppFileDesign() {
        $sql = "SELECT * FROM fichiers";
        $result=$this->connect()->query($sql);
        $result->execute();
        while($result1 = $result->fetch()) {
            echo "<div class='espA5'>";
            echo "<ul>";
            echo '<li>Titre: '.substr($result1['titre'], 0, 28);          
            echo '<li>Description : '.substr($result1['description'], 0, 21);         
            echo '<li>Type : '.$result1['type'];          
            echo '<li>Categorie : '.$result1['categorie'];            
            echo '<li>User id: '.$result1['id_user'];
            echo '<li>Date d\'upload : '.$result1['date_upload'];     
            echo "</ul>";
            echo "</div>";
            echo "<div class='espA5 espA5btn'>";
            echo '<a href="index.php?action=supprimer&id='.$result1['id'].'" onclick="return(confirm(\'Etes vous sûr de vouloir supprimer ce fichier ?\'))" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-right:15px">Supprimer </a>';
            echo "</div>"; 
        }
        
        if(isset($_GET['action']) AND isset($_GET['id'])) {
            $action = $_GET['action'];
            if($action == "supprimer"){
                $id = $_GET['id'];
                $bdd = "DELETE FROM fichiers WHERE id='$id'";
                $request=$this->connect()->query($bdd);
                $request->execute();
                die('<META HTTP-equiv="refresh" content=0;URL=index.php>');
            }
        }
    }    

}