                <h4 style="text-align: center;">Mes favoris   <i class="material-icons">favorite_border</i></h4>

                <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
                  <div class="mdl-tabs__tab-bar">
                      <a href="#starks-panel" class="mdl-tabs__tab is-active">Vidéos</a>
                      <a href="#lannisters-panel" class="mdl-tabs__tab">Audios</a>
                      <a href="#targaryens-panel" class="mdl-tabs__tab">E-Books</a>
                  </div>

                  <div class="mdl-tabs__panel is-active" id="starks-panel">
                    <ul>
                      <?php
                        $fav=new ModeleFichier();
                        $favoris=$fav->favDesVid($id);
                      ?>
                    </ul>
                  </div>
                  <div class="mdl-tabs__panel" id="lannisters-panel">
                    <ul>
                      <?php
                        $fav=new ModeleFichier();
                        $favoris=$fav->favDesAud($id);
                      ?>
                    </ul>
                  </div>
                  <div class="mdl-tabs__panel" id="targaryens-panel">
                    <ul>
                      <?php
                        $fav=new ModeleFichier();
                        $favoris=$fav->favDesEb($id);
                      ?>
                    </ul>
                  </div>
                </div>  