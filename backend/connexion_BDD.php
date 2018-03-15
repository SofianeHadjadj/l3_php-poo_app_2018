<?php
     try {
    $dbh = new PDO('mysql:host=localhost;dbname=DW02_2018', 'DW02_2018', '7iqpmyah');
          } 
          catch(Exception $e)
          {
            die('Erreur : ' . $e->getMessage());
          }
?>


