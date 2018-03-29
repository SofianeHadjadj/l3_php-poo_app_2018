      <header class="mdl-layout__header mdl-layout__header--scroll" style="background-color: #424242">
        <div class=" mdl-layout__header-row">

          <form method="post" action="../../index.php">
            <input type="hidden" name="mode" value="access">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast mdl-layout--small-screen-only" id="add">
              Confort de lecture
            </button>            
          </form>

        </div>
        <div class="mdl-layout__header-row">
          <div id="contLogo"><img src="assets/images/logo_white.png" width="100%"></div>
          <div id="login" class="mdl-layout--large-screen-only">
            <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect login" style="margin-right: 15px">
              connexion
            </button>           
          </div>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="background-color: #212121">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btnLog">
              <i class="material-icons">perm_identity</i>
            </button>

          <form method="post" action="../../index.php">
            <input type="hidden" name="mode" value="access">
            <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" id="add2">
              Confort de lecture
            </button>            
          </form>

        </div>
      </header>
        <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right" for="btnLog">
          <li class="mdl-menu__item login">Connexion</li>
        </ul> 