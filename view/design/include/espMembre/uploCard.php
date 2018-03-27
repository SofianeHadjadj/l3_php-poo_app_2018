                 <form method="post" action="../../files/reception.php" enctype="multipart/form-data"> 

                  <div style="width: 100%;height: 100%;">

                    <div class="wrappUpl">

                      <div style="margin-left: 20px;">
                        <input style="position: absolute;left: -20000px" type="file" name="mon_fichier" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple required/> 

                        <label for="file-1" class="mdl-shadow--4dp"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>                       
                      </div>



                    <div class="mdl-textfield mdl-js-textfield" style="margin-left: 20px;">
                      <input class="mdl-textfield__input" type="text" name="titre" id="titre" required>
                      <label class="mdl-textfield__label" for="titre">Titre du fichier...</label>
                    </div>

                    </div>

                    <div class="wrappUpl">     

                      <div class="mdl-textfield mdl-js-textfield emGrBt">
                        <textarea class="mdl-textfield__input" type="text" rows= "3" id="description" name="description" required></textarea>
                        <label class="mdl-textfield__label" for="description">Description...</label>
                      </div>

                    </div>

                    <div class="wrappUpl">
                     
                     <div class="emGrBt">

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="vid">
                      <input type="radio" id="vid" class="mdl-radio__button" name="type" value="vid" onchange="selVid()">
                      <span class="mdl-radio__label">Vidéo</span>
                    </label>

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="aud">
                      <input type="radio" id="aud" class="mdl-radio__button" name="type" value="aud" onchange="selAud()">
                      <span class="mdl-radio__label">Audio</span>
                    </label>

                    <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="eb">
                      <input type="radio" id="eb" class="mdl-radio__button" name="type" value="eb" onchange="selEb()">
                      <span class="mdl-radio__label">E-book</span>
                    </label>


                     <div class="form-inline" id="radioDPRT">

                      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cin">
                        <input type="radio" id="cin" class="mdl-radio__button" name="categorie" value="cin" disabled>
                        <span class="mdl-radio__label">Cinéma</span>
                      </label>

                      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="doc">
                        <input type="radio" id="doc" class="mdl-radio__button" name="categorie" value="doc" disabled>
                        <span class="mdl-radio__label">Documentaire</span>
                      </label>

                      <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oc">
                        <input type="radio" id="oc" class="mdl-radio__button" name="categorie" value="oc" disabled>
                        <span class="mdl-radio__label">Oeuvre commentée</span>
                      </label>
  

                     </div>
                     <div>
                       <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="postFile">
                          Poster
                        </button>
                     </div>

                     </div>

                    </div>

                  </div>
                 </form> 