        <div class="mdl-layout__tab-panel" id="videos" style="padding: 0">
          <div style="width: 100%;height: 50px;">
          <a href="#" id="cinema" class="mdl-layout__tab is-active" style="color: black">Cinéma</a>
          <a href="#" id="documentaires" class="mdl-layout__tab" style="color: black">Documentaires</a>
          <a href="#" id="oeuvres_commentees" class="mdl-layout__tab" style="color: black">Oeuvres commentées</a>           
          </div>
          <main class="mdl-layout__content" id="mainVid">

          <!-- Cinéma -->       

            <div id="vidCont">
              <div id="cinCont">

                <?php

                $fichiers=new ModeleFichier();
                $files=$fichiers->voirFichiers();   
                while ($donnees = $files->fetch()) {    
                  if ($donnees['type'] == "vid" && $donnees['categorie'] == "cin") {   
                ?>

                <div class="demo-card-wide mdl-card mdl-shadow--4dp card-inline mdl-card-margin">
                  <div class="mdl-card__title mdl-card__titleCi">
                    <h2 class="mdl-card__title-text"><?php echo $donnees['titre'] ?></h2>
                  </div>
                  <div class="mdl-card__supporting-text mdl-description">
                    <?php echo $donnees['description'] ?>
                  </div>
                  <div class="mdl-card__actions mdl-card--border">

                  <form method="post" action="">
                    <input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
                    <input type="hidden" name="description" value="<?php echo $donnees['description']; ?>">
                    <input type="hidden" name="extension" value="<?php echo $donnees['extension']; ?>">
                    <button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                      Voir le film
                    </button>
                  </form>

                  </div>

                  <div class="mdl-card__menu">
                    <form method="post" action="favoris.php">
                      <input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
                      <input type="hidden" name="id_user" value="<?php echo $id; ?>">
                      <input type="hidden" name="id_file" value="<?php echo $donnees['id']; ?>">                    
                      <button type="submit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                        <i class="material-icons">favorite</i>
                      </button>
                    </form>
                  </div>
                </div>                 

              <?php
                  }
                }                  
              ?>                 

              </div>

            <!-- Documentaire -->

              <div id="docCont" style="display: none;">
                <div class="demo-card-wide mdl-card mdl-shadow--4dp card-inline">
                  <div class="mdl-card__title mdl-card__titleDo">
                    <h2 class="mdl-card__title-text">Movie name</h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                    Movie description : Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </div>
                  <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                      Movie link
                    </a>
                  </div>
                  <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                      <i class="material-icons">favorite</i>
                    </button>
                  </div>
                </div>                 
              </div>

            <!-- Oeuvre commentée -->

              <div id="oeuvCont" style="display: none;">
                <div class="demo-card-wide mdl-card mdl-shadow--4dp card-inline">
                  <div class="mdl-card__title mdl-card__titleOe">
                    <h2 class="mdl-card__title-text">Movie name</h2>
                  </div>
                  <div class="mdl-card__supporting-text">
                    Movie description : Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  </div>
                  <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                      Movie link
                    </a>
                  </div>
                  <div class="mdl-card__menu">
                    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                      <i class="material-icons">favorite</i>
                    </button>
                  </div>
                </div>                 
              </div>
            </div>
          </main>
        </div>