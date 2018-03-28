        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col" style="padding-right: 50px;padding-left: 50px;">
            <h3>Formulaire d'inscription</h3>

            <form name="inscription" method="POST" action="inscription.php?module=2">

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="nom" name="nom">
                  <label class="mdl-textfield__label" for="nom">Nom...</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="prenom" name="prenom">
                  <label class="mdl-textfield__label" for="prenom">Prénom...</label>
                </div>
                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="text" id="identifiant" name="identifiant">
                  <label class="mdl-textfield__label" for="identifiant">Identifiant...</label>
                </div>
                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="password" id="mdp" name="mdp">
                  <label class="mdl-textfield__label" for="mdp">Mot de passe...</label>
                </div>
                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="password" id="mdp_verif" name="mdp_verif">
                  <label class="mdl-textfield__label" for="mdp_verif">Mot de passe (vérification)...</label>
                </div>
                
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                  <input class="mdl-textfield__input" type="email" id="mail" name="mail">
                  <label class="mdl-textfield__label" for="mail">E-mail...</label>
                </div>
                
                <div>
                  <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" style="margin-bottom: 60px;margin-top: 30px;">
                    Valider
                  </button>                  
                </div>


            </form>

          </div>
        </div>