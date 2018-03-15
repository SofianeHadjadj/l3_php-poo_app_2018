<?php
session_start(); // On démarre la session 
include('connexion_BDD.php');
$id=$_SESSION['id'];



                if (isset($id)) {
                    $sql=$dbh->query("SELECT statut FROM utilisateurs WHERE id='$id'");

                    while ( $result = $sql->fetch())
                    {

                        if ($result['statut'] == 1){
                            ?>
                <html>
                    <head>
                        <meta charset="utf-8" />
                        <title>Accueil</title>
                        <link href="style.css" rel="stylesheet">
                    </head>
                    <body>
                    <ul>
                        <li class="active"><a href="index.php">Accueil </a></li>
                        <li><a href="livres.php">Consulter les livres </a></li>
                        <li><a href="video.php">Consulter les vidéos </a></li>
                        <li><a href="art.php">Consulter les oeuvres d'art </a></li>
                        <li><a href="administration.php">Interface administration </a></li>
                        <li><a href="logout.php">Déconnexion </a></li>
                    </ul>    
                            <?php
                        }
                        else {
                            ?>
                    <ul>
                        <li class="active"><a href="index.php">Accueil </a></li>
                        <li><a href="ajouter.php">Ajouter un média </a></li>
                        <li><a href="livres.php">Consulter les livres </a></li>
                        <li><a href="video.php">Consulter les vidéos </a></li>
                        <li><a href="art.php">Consulter les oeuvres d'art </a></li>
                        <li><a href="espace_membre.php">Mon espace perso </a></li>
                        <li><a href="view_files.php">Voir la liste des médias </a></li>
                        <li><a href="logout.php">Déconnexion </a></li>
                    </ul> 
                            <?php
                        }
                    }
                }

                else {
                    ?>
                <ul>         
                    <li class="active"><a href="index.php">Accueil </a></li>
                    <li><a href="livres.php">Consulter les livres </a></li>
                    <li><a href="video.php">Consulter les vidéos </a></li>
                    <li><a href="art.php">Consulter les oeuvres d'art </a></li>
                    <li><a href="connexion.php">Connexion/inscription </a></li>
                </ul> 
                </body>
            </html>
                    <?php
                }
            
        ?>
