<?php
/**
 * Description of ModeleUtilisateur
 *
 * @author Groupe DW02
 */
class ModeleUtilisateur extends db {
    private $_id;
    
    public function __construct($id) {
        $this->_id = $id;
    }

    public function get_id() {
        return $this->_id;
    }

    public function set_id($_id) {
        $this->_id = $_id;
        return $this;
    }
    
    public function affiche() {
        echo 'Votre id est : ' , $this->_id, '. <br>';
    }
    
    public function afficheMenu() {
            $sql="SELECT statut FROM utilisateurs WHERE id='".$this->get_id()."'";
            $result=$this->connect()->query($sql);
            $result->execute();
                    while ( $result1 = $result->fetch())
                    {
                        $_SESSION["statut"]=$result1["statut"];
                    }   
        }
    

    public function connexion() {
        $IDENT=$_SESSION['IDENT'];
        $PASS=$_SESSION['PASS'];
        $sql="SELECT * FROM utilisateurs WHERE identifiant='$IDENT'";
        $result=$this->connect()->query($sql);
        $result->execute();
            while($result1 = $result->fetch()){
                if ($result1['mdp'] == $PASS) {
                    echo'<p>Vous êtes maintenant connecté !</p>';  
                    $_SESSION["id"]=$result1["id"];
                }
                else{ // Acces pas OK !
                    echo"<p>Une erreur s'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré n'est pas correct.</p><p>Cliquez <a href='./index.php'>ici</a>pour revenir à la page précédente</p>";
                }
                
            }
    }

    public function supprimer() {
        $sql = "SELECT * FROM utilisateurs";
        $result=$this->connect()->query($sql);
        $result->execute();
        echo "<h1>Utilisateurs à supprimer :</h1>";
        while($result1 = $result->fetch()) {
            echo 'Nom: ';
            echo $result1['nom'];
            echo '<br/>';
            echo ' Prenom : ';
            echo $result1['prenom'];
            echo '<br/>';
            echo ' Identifiant: ';
            echo $result1['identifiant'];
            echo '<br/>';
            echo ' Mot de passe: ';
            echo $result1['mdp'];
            echo '<br/>';
            echo ' E-mail: ';
            echo $result1['mail'];
            echo '<br/>';
            echo '<a href="supprimer.php?action=supprimer&id='.$result1['id'].'">Supprimer </a>';
            echo '<br/><br/>';
        }
        if(isset($_GET['action']) AND isset($_GET['id'])) {
            $action = $_GET['action'];
            if($action == "supprimer"){
                $id = $_GET['id'];
                $bdd = "DELETE FROM utilisateurs WHERE id='$id'";
                $request=$this->connect()->query($bdd);
                $request->execute();
                die('<META HTTP-equiv="refresh" content=0;URL=supprimer.php>');
            }
        }
    }
}

class ModeleValidation extends db {

    public function inscription() {
        $sql = "INSERT INTO validation (identifiant, prenom, nom, mail, mdp, statut, date_inscription) VALUES('".$_SESSION['IDENTIFIANT']."', '".$_SESSION['PRENOM']."', '".$_SESSION['NOM']."', '".$_SESSION['MAIL']."', '".$_SESSION['MDP']."', '0', '".date('Y-m-d')."')";
        $result=$this->connect()->exec($sql);
        echo "<br><p>Données enregistrées, vous allez bientôt recevoir un e-mail confirmant votre inscription</p><br>";
        echo '<p><a href="connexion.php">Se connecter</a></p>';
    }

    public function delete($id) {
        $sql = "DELETE FROM validation WHERE id='".$id."'";
        $result=$this->connect()->query($sql);
        $result->execute();
        die('<META HTTP-equiv="refresh" content=0;URL=validation.php>');
    }

    public function valider() {
        $sql = "SELECT * FROM validation";
        $result=$this->connect()->query($sql);
        $result->execute();
        echo "<h1>Utilisateurs à valider :</h1>";
        while($result1 = $result->fetch()) {
            echo 'Nom: ';
            echo $result1['nom'];
            echo '<br/>';
            echo ' Prenom : ';
            echo $result1['prenom'];
            echo '<br/>';
            echo ' Identifiant: ';
            echo $result1['identifiant'];
            echo '<br/>';
            echo ' Mot de passe: ';
            echo $result1['mdp'];
            echo '<br/>';
            echo ' E-mail: ';
            echo $result1['mail'];
            echo '<br/>';
            echo '<a href="validation.php?action=accepter&id='.$result1['id'].'">Accepter </a>';
            echo '<a href="validation.php?action=refuser&id='.$result1['id'].'">Refuser</a>';
            echo '<br/>';
        }
 
        if(isset($_GET['action']) AND isset($_GET['id'])) {
            $action = $_GET['action'];
            if($action == "accepter"){
                $id = $_GET['id'];
                $sql2 = "SELECT * FROM validation WHERE id='".$id."'";
                $request=$this->connect()->query($sql2);
                $request->execute();
                while($request1 = $request->fetch()){
                    $nom = $request1['nom'];
                    $prenom = $request1['prenom'];
                    $identifiant = $request1['identifiant'];
                    $mdp = $request1['mdp'];
                    $mail = $request1['mail'];
                    $sql = "INSERT INTO utilisateurs (identifiant, prenom, nom, mail, mdp, statut, date_inscription) VALUES('$identifiant', '$prenom', '$nom', '$mail', '$mdp', '0', '".date('Y-m-d')."')";
                    $result=$this->connect()->query($sql);
                    $supprimer=$this->delete($id);
                }
            }
            elseif($action == "refuser") {
                $id = $_GET['id'];
                $supprimer2=$this->delete($id);
            }
        }
    }
}