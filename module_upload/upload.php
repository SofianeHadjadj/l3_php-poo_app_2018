<form method="post" action="reception.php" enctype="multipart/form-data">
     <label for="mon_fichier">Fichier (tous formats | max. 1 Go) :</label><br />
     
     <input type="file" name="mon_fichier" id="mon_fichier" /><br />
     <label for="titre">Titre du fichier (max. 50 caractères) :</label><br />
     <input type="text" name="titre" placeholder="Titre du fichier" id="titre" /><br />
    <!-- <label for="description">Description de votre fichier (max. 255 caractères) :</label><br />
     <textarea name="description" id="description"></textarea><br />-->
     <input type="submit" name="submit" value="Envoyer" />
</form>
