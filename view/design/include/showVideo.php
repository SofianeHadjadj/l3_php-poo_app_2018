            <?php   

            $nom = $_POST['titre'].".".$_POST['extension'];
            $lien = "../../files/upload/".$nom;
            $type = "video/".$_POST['extension'];

            if ($_POST['extension'] != "") {
            ?>
              <div id="wrappVidBig">
                <h3 style="margin-bottom: 30px;"><?php echo $_POST['titre'];?></h3>



                <div id="contSVid">
                <form method="post" action="">
                  <input type="hidden" name="extension" value="">
                  <button type="submit" class="mdl-button mdl-js-button mdl-button--icon mdl-button--accent" style="position: absolute;top: 70px;right: 70px" id="clsVid">
                    <i class="material-icons">clear</i>
                  </button>
                  <div class="mdl-tooltip" data-mdl-for="clsVid">
                  Fermer le lecteur
                  </div> 
                </form>                  
                  <div id="subCSV1" class="subCSV">
                    <video class="mdl-shadow--4dp" width="600" controls>
                      <source src="<?php echo $lien;  ?>" type="<?php if ($_POST['extension'] == "flv") {echo "video/x-flv";} else if ($_POST['extension'] == "mkv") {echo "video/webm";} else {echo $type;}   ?>" />
                    </video>    
                  </div>

                   <div class="subCSV" id="subCSV2">
                    <div class="mdl-card mdl-shadow--4dp" style="width: 500px; text-align: justify;padding: 50px">
                      <?php echo $_POST['description'];  ?>
                    </div>

                    <div style="margin-top: 50px;">
                      <a href="<?php echo $lien;  ?>" download="<?php echo $nom;  ?>" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" >
                        T&eacute;l&eacute;charger le fichier<i class="material-icons">file_download</i>
                      </a>
                    </div>                 
                   </div>              
                </div>
             
              </div>

            <?php
            }

            ?>      

