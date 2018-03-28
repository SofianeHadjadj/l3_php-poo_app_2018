<?php


    $fichiersVal=new ModeleValidationMedia();
    $validation=$fichiersVal->validerMedia();

    while ($donnees = $validation->fetch()) {

        ?>

                <ul>            
                  <li>id : <?php echo $donnees["id"];?></li>
                  <li>Titre : <?php echo $donnees["titre"];?></li>
                  <li>Description : <?php echo $donnees["description"];?></li>
                  <li>Type : <?php echo $donnees["type"];?></li>
                  <li>Categorie : <?php echo $donnees["categorie"];?></li>
                  <li>Extension : <?php echo $donnees["extension"];?></li>
                  <li>Id user : <?php echo $donnees["id_user"];?></li>
                  <li>Date d'upload : <?php echo $donnees["date_upload"];?></li>
                </ul>

                <br>

            <form method="post" action="../../controller/validmedia.cont.php" style="display: inline-block">

                <input type="hidden" name="id" value="<?php echo $donnees["id"];?>">
                <input type="hidden" name="titre" value="<?php echo $donnees["titre"];?>">
                <input type="hidden" name="description" value="<?php echo $donnees["description"];?>">
                <input type="hidden" name="type" value="<?php echo $donnees["type"];?>">
                <input type="hidden" name="categorie" value="<?php echo $donnees["categorie"];?>">
                <input type="hidden" name="extension" value="<?php echo $donnees["extension"];?>">
                <input type="hidden" name="id_user" value="<?php echo $donnees["id_user"];?>">
                <input type="hidden" name="date_upload" value="<?php echo $donnees["date_upload"];?>">

                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="margin-left: 20px;">Valider</button>

            </form>

            <form method="post" action="../../controller/delfile.cont.php" style="display: inline-block">

                <input type="hidden" name="id" value="<?php echo $donnees["id"];?>">
                <input type="hidden" name="titre" value="<?php echo $donnees["titre"];?>">
                <input type="hidden" name="extension" value="<?php echo $donnees["extension"];?>">
                          
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" style="margin-left: 20px;">Supprimer</button>
               
            </form>


        <?php

          echo "<br>_______________<br>";

    }

?>