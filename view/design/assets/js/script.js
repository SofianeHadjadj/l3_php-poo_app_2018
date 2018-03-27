      $(document).ready(function(){
          $(".login").click(function(){
              $("#cnxPage").show();
          });
          $("#closeCnx").click(function(){
              $("#cnxPage").hide();
          });         
      });
      
    function selVid() {
        if(document.getElementById('vid').value == "vid"){
            document.getElementById('radioDPRT').innerHTML = '<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cin"><input type="radio" id="cin" class="mdl-radio__button" name="categorie" value="cin"><span class="mdl-radio__label">Cinéma</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="doc"><input type="radio" id="doc" class="mdl-radio__button" name="categorie" value="doc"><span class="mdl-radio__label">Documentaire</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oc"><input type="radio" id="oc" class="mdl-radio__button" name="categorie" value="oc"><span class="mdl-radio__label">Oeuvre commentée</span></label>';
        }
    }
    function selAud() {
        if(document.getElementById('aud').value == "aud"){
            document.getElementById('radioDPRT').innerHTML = '<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cin"><input type="radio" id="cin" class="mdl-radio__button" name="categorie" value="cin" disabled><span class="mdl-radio__label">Cinéma</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="doc"><input type="radio" id="doc" class="mdl-radio__button" name="categorie" value="doc" disabled><span class="mdl-radio__label">Documentaire</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oc"><input type="radio" id="oc" class="mdl-radio__button" name="categorie" value="oc" disabled><span class="mdl-radio__label">Oeuvre commentée</span></label>';
        }
    }
    function selEb() {
        if(document.getElementById('eb').value == "eb"){
            document.getElementById('radioDPRT').innerHTML = '<label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="cin"><input type="radio" id="cin" class="mdl-radio__button" name="categorie" value="cin" disabled><span class="mdl-radio__label">Cinéma</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="doc"><input type="radio" id="doc" class="mdl-radio__button" name="categorie" value="doc" disabled><span class="mdl-radio__label">Documentaire</span></label><label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="oc"><input type="radio" id="oc" class="mdl-radio__button" name="categorie" value="oc" disabled><span class="mdl-radio__label">Oeuvre commentée</span></label>';
        }
    } 