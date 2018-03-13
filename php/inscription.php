<?php
    $module=$_GET['module'];
    include('connexion_BDD.php');
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Inscription</title>
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div id="inscription">
            <h1>Formulaire d'inscription</h1>

            <p>Bienvenue sur la page d'inscription du site CapTure</p>
<?php
    if ($module==1){
        echo "<p>Veuillez renseigner les champs ci-dessous</p>";          
?>
            <form name="inscription" method="POST" action="inscription.php?module=2">
                <fieldset>
                    <label for="nom" class="float">Nom :</label> <input type="text" name="nom"/><br /><br>
                    <label for="prenom" class="float">Prénom :</label> <input type="text" name="prenom"/> <br /><br>                    
                    <label for="identifiant" class="float">Identifiant :</label> <input type="text" name="identifiant"/><br /><br>
                    <label for="mdp" class="float">Mot de passe :</label> <input type="password" name="mdp"/><br /><br>
                    <label for="mdp_verif" class="float">Mot de passe (vérification) :</label> <input type="password" name="mdp_verif"/><br /><br>
                    <label for="mail" class="float">Mail :</label> <input type="text" name="mail"/> <br /><br>
                    <div class="center"><input type="submit" value="Valider" /></div>
                </fieldset>

            </form>
<?php  
    } 
    if ($module==2){
        // Sécurité
        $NOM=mysql_real_escape_string(htmlspecialchars($_POST['nom']));
        $PRENOM=mysql_real_escape_string(htmlspecialchars($_POST['prenom']));
        $IDENTIFIANT=mysql_real_escape_string(htmlspecialchars($_POST['identifiant']));
        $MDP=mysql_real_escape_string(htmlspecialchars($_POST['mdp']));
        $MAIL=mysql_real_escape_string(htmlspecialchars($_POST['mail']));
        $MDP_VERIF = mysql_real_escape_string(htmlspecialchars($_POST['mdp_verif']));
      
        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['identifiant']) || empty($_POST['mdp']) || empty($_POST['mail'])) {
            echo "Merci de compléter tous les champs";
            echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
        }
        else{
            // Sécurité
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $MAIL)){ // on vérifie si l'email à un format valide.
                if($MDP == $MDP_VERIF){ // on vérifie que les deux mots de passe soient identique.
                    $connex->exec("INSERT INTO validation (nom, prenom, identifiant, mail, mdp) VALUES ('$NOM','$PRENOM','$IDENTIFIANT','$MAIL','$MDP')");
                    echo "<br><p>Données enregistrées, vous allez bientôt recevoir un e-mail confirmant votre inscription</p><br>";
                    echo '<p><a href="connexion.php">Se connecter</a></p>';
                }
                else{
                    echo "Vos mots de passe ne sont pas identiques.";
                    echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
                }
            }
            else {
                echo "Votre adresse e-mail n'est pas valide.";
                echo '<p>Cliquez <a href="inscription.php?module=1">ici</a> pour revenir</p>';
            }
        }    
    }
      
?>

</div>
</body>
</html>
