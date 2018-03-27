      <header class="mdl-layout__header mdl-layout__header--scroll" style="background-color: #424242">
        <div class=" mdl-layout__header-row">
          <h4 style="text-align: center;position: absolute;left: 30%" class="mdl-layout--small-screen-only"">Bienvenu <?php echo $_SESSION['prenomUsr']; ?></h4>

          <form method="post">
            <input type="hidden" name="mode" value="access">
            <a href="../../index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast mdl-layout--small-screen-only" id="add">
              Confort de lecture
            </a>            
          </form>

      
        </div>
        <div class="mdl-layout__header-row">
          <div id="contLogo"><img src="assets/images/logo_white.png" width="100%"></div>
          <h4 style="text-align: center;position: absolute;left: 50%" class="mdl-layout--large-screen-only"">Bienvenu <?php echo $_SESSION['prenomUsr']; ?></h4>
          <div id="login" class="mdl-layout--large-screen-only">
            <a href="logout.php">
              <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect">
                déconnexion
              </button>            
            </a>
          </div>
        </div>
        <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        </div>
        <div class="mdl-layout__tab-bar mdl-js-ripple-effect" style="background-color: #212121">
          <a href="#accueil" class="mdl-layout__tab is-active">Accueil</a>
          <a href="#videos" class="mdl-layout__tab">Vidéos</a>
          <a href="#audios" class="mdl-layout__tab">Audios</a>
          <a href="#ebook" class="mdl-layout__tab">e-Books</a>
          <a href="#admin" class="mdl-layout__tab">Administration</a>
          <a href="logout.php">
            <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon" id="btnLog">
              <img src="assets/images/icones/logout_white.png" width="24px">
            </button>
          </a>
            <div class="mdl-tooltip mdl-tooltip--left" data-mdl-for="btnLog">Déconnexion</div>

          <form method="post">
            <input type="hidden" name="mode" value="access">
            <a href="../../index.php" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast" id="add">
              Confort de lecture
            </a>            
          </form>

      
        </div>
      </header>