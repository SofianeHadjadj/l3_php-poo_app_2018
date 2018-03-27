        <div class="mdl-layout__tab-panel" id="membre" style="height: 100%; width: 100%">
          <h3>Espace Perso</h3>

          <div style="width: 97%;margin : auto;margin-bottom: 100px;" id="mSpace">
            
            <div id="topSpace">
              
              <div id="leftSpace">
                <div id="favCont" class="mdl-card mdl-shadow--4dp">

                <?php include ('include/espMembre/favCard.php'); ?>
                  
                </div>
              </div>

              <div id="rightSpace">
                <div id="infoCont" class="mdl-card mdl-shadow--4dp">
                  
                  <?php include ('include/espMembre/infoCard.php'); ?>

                </div>

                <div id="histoCont" class="mdl-card mdl-shadow--4dp">
                  
                <?php include ('include/espMembre/histoCard.php'); ?>

                </div>
              </div>
              
            </div>

            <div id="botSpace">

              <div id="uplCont" class="mdl-card mdl-shadow--4dp">
                <h4 style="text-align: center;">Uploader un nouveau fichier <i class="material-icons">backup</i></h4>

                <?php include ('include/espMembre/uploCard.php'); ?>

              </div>
    
            </div>

          </div>

        </div>