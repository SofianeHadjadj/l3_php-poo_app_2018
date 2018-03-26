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
        die('<META HTTP-equiv="refresh" content=0;URL=supprimer_media.php>');
    }

    public function favoris() {
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


}