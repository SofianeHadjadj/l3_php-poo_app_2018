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
	
    //Recupere le statut (1 ou 2) pour afficher le bon menu de l'utilisateur ou de l'admin
    public function afficheMenu() {
		$sql="SELECT statut FROM utilisateurs WHERE id='".$this->get_id()."'";
		$result=$this->connect()->query($sql);
		$result->execute();
		while ( $result1 = $result->fetch()){
            $_SESSION["statut"]=$result1["statut"];
        }   
    }
    
    //Permet de se connecter en vérifiant dans la bdd si l'utilisateur existe
    public function connexion() {
        $IDENT=$_SESSION['IDENT'];
        $PASS=sha1($_SESSION['PASS']);
        $sql="SELECT * FROM utilisateurs WHERE identifiant='$IDENT'";
        $result=$this->connect()->query($sql);
        $result->execute();
		while($result1 = $result->fetch()){
			if ($result1['mdp'] == $PASS) {
				echo'<p class="hideIfDesign">Vous êtes maintenant connecté !</p>';  
				$_SESSION["id"]=$result1["id"];
			}
			else{ // Acces pas OK !
				echo"<p>Une erreur s'est produite pendant votre identification.<br /> Le mot de passe ou le pseudo entré n'est pas correct.</p><p>Cliquez <a href='./index.php'>ici</a>pour revenir à la page précédente</p>";
			}
			$_SESSION['prenomUsr'] = ucfirst($result1['prenom']);
			$_SESSION['nomUsr'] = ucfirst($result1['nom']);
			$_SESSION['mailUsr'] = $result1['mail'];
		}
    }
	
	//Supprime un utilisateur de la bdd avec la demande si on veut vraiment le supprimer
    public function supprimer() {
        $sql = "SELECT * FROM utilisateurs";
        $result=$this->connect()->query($sql);
        $result->execute();
        echo "<h1>Utilisateurs à supprimer :</h1>";
        while($result1 = $result->fetch()) {
            if ($result1['statut'] != 1) {
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
                echo '<a href="supprimer.php?action=supprimer&id='.$result1['id'].'" onclick="return(confirm(\'Etes vous sûr de vouloir supprimer cet utilisateur?\'))">Supprimer </a>';
                echo '<br/><br/>';
            }
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

	//Fonction qui supprime un utilisateur dans la version design
    public function suppUsrDesign() {
        $sql = "SELECT * FROM utilisateurs";
        $result=$this->connect()->query($sql);
        $result->execute();
        while($result1 = $result->fetch()) {
            if ($result1['statut'] != 1) {
                echo "<div class='espA5'>";
                echo "<ul>";
                echo '<li>Nom: '.$result1['nom'];           
                echo '<li>Prenom : '.$result1['prenom'];            
                echo '<li>Identifiant: '.$result1['identifiant'];           
                echo '<li>Mot de passe: '.$result1['mdp'];          
                echo '<li>E-mail: '.$result1['mail'];           
                echo "</ul>";
                echo "</div>";
                echo "<div class='espA5 espA5btn'>";
                echo '<a href="index.php?action=supprimer&id='.$result1['id'].'" onclick="return(confirm(\'Etes vous sûr de vouloir supprimer cet utilisateur?\'))" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-right:15px">Supprimer </a>';
                echo "</div>";
            }
        }
		
        if(isset($_GET['action']) AND isset($_GET['id'])) {
            $action = $_GET['action'];
            $_SESSION['message'] = "L'utilisateur a bien &eacute;t&eacute; supprim&eacute;";
            if($action == "supprimer"){
                $id = $_GET['id'];
                $bdd = "DELETE FROM utilisateurs WHERE id='$id'";
                $request=$this->connect()->query($bdd);
                $request->execute();
                die('<META HTTP-equiv="refresh" content=0;URL=index.php>');
            }
        }
    }

}

class ModeleValidation extends db {

	//permet d'insérer dans une table provisoire un utilisateur qui s'inscrit
    public function inscription() {
        $sql = "INSERT INTO validation (identifiant, prenom, nom, mail, mdp, statut, date_inscription) VALUES('".$_SESSION['IDENTIFIANT']."', '".$_SESSION['PRENOM']."', '".$_SESSION['NOM']."', '".$_SESSION['MAIL']."', '".sha1($_SESSION['MDP'])."', '0', '".date('Y-m-d')."')";
        $result=$this->connect()->exec($sql);
        echo "<div class='hideIfDesign'><br><p>Données enregistrées, vous allez bientôt recevoir un e-mail confirmant votre inscription</p><br>";
        echo '<p><a href="connexion.php">Se connecter</a></p></div>';
    }

	//Supprime un utilisateur pas encore validé
    public function delete($id) {
        $sql = "DELETE FROM validation WHERE id='".$id."'";
        $result=$this->connect()->query($sql);
        $result->execute();
        die('<META HTTP-equiv="refresh" content=0;URL=validation.php>');
    }

    public function delTempDesign($id) {
        $sql = "DELETE FROM validation WHERE id='".$id."'";
        $result=$this->connect()->query($sql);
        $result->execute();
        die('<META HTTP-equiv="refresh" content=0;URL=index.php>');
    }

	//Valide un utilisateur et l'envoie vers la bonne table, ce qui lui permet de se connecter et d'utiliser l'application
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

	//Valide l'utilisateur dans la version design
    public function validUsrDesign() {
        $sql = "SELECT * FROM validation";
        $result=$this->connect()->query($sql);
        $result->execute();

        while($result1 = $result->fetch()) {           
            echo "<div class='espA5'>";
			echo "<ul>";
			echo '<li>Nom: '.$result1['nom'];			
			echo '<li>Prenom : '.$result1['prenom'];			
			echo '<li>Identifiant: '.$result1['identifiant'];		
			echo '<li>Mot de passe: '.$result1['mdp'];		
			echo '<li>E-mail: '.$result1['mail'];		
			echo "</ul>";
            echo "</div>";
            echo "<div class='espA5 espA5btn'>";
            echo '<a href="index.php?action=accepter&id='.$result1['id'].'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="margin-right:15px">Accepter </a>';
            echo '<a href="index.php?action=refuser&id='.$result1['id'].'" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">Refuser</a>';
            echo "</div>";
        }
 
        if(isset($_GET['action']) AND isset($_GET['id'])) {
            $action = $_GET['action'];
            if($action == "accepter"){
                $id = $_GET['id'];
                $_SESSION['message'] = "L'utilisateur a bien &eacute;t&eacute; enregistr&eacute;";
                $sql2 = "SELECT * FROM validation WHERE id='".$id."'";
                $request=$this->connect()->query($sql2);
                $request->execute();
                while($request1 = $request->fetch()){
                    $nom = $request1['nom'];
                    $prenom = $request1['prenom'];
                    $identifiant = $request1['identifiant'];
                    $mdp = $request1['mdp'];
                    $mail = $request1['mail'];
                    $sql = "INSERT INTO utilisateurs (identifiant, prenom, nom, mail, mdp, statut, date_inscription) VALUES('$identifiant', '$prenom', '$nom', '$mail', '$mdp', '2', '".date('Y-m-d')."')";
                    $result=$this->connect()->query($sql);
                    $supprimer=$this->delTempDesign($id);
                }
            }
            elseif($action == "refuser") {
                $id = $_GET['id'];
                $_SESSION['message'] = "L'utilisateur a bien &eacute;t&eacute; supprim&eacute;";
                $supprimer2=$this->delTempDesign($id);
            }
        }
    }

}