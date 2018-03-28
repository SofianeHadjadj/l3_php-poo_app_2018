<?php
//Cette classe permet de se connecter à la base de données
class db {
    private $_servername;
    private $_username;
    private $_password;
    private $_dbname;
//connexion au serveur, nom, mdp et BDD   
    protected function connect() {
        $this->_servername="localhost";
        $this->_username="DW02_2018";
        $this->_password="7iqpmyah";
        $this->_dbname="DW02_2018";
//Vérifie si tout va bien dans la connexion                
        try
        {
            $dbh = new PDO("mysql:host=$this->_servername;dbname=$this->_dbname", $this->_username, $this->_password);
			$dbh->exec("set names utf8");
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                  
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
        return $dbh;
    }
}

?>

