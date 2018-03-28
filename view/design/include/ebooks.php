        <div class="mdl-layout__tab-panel" id="ebook">
          <main class="mdl-layout__content" id="mainEb">

		<!-- E-Book -->       

		<div id="ebCont">
			<div id="subEbCont">
				<?php

					$fichiers=new ModeleFichier();
					$files=$fichiers->voirFichiers();  

					while ($donnees = $files->fetch()) {    
						if ($donnees['type'] == "eb") {   
				?>

					<div class="demo-card-wide mdl-card mdl-shadow--4dp card-inline mdl-card-margin">
						<div class="mdl-card__title mdl-card__titleEb">
							<h2 class="mdl-card__title-text"><?php echo $donnees['titre'] ?></h2>
						</div>
						<div class="mdl-card__supporting-text mdl-description">
							<?php echo $donnees['description'] ?>
						</div>
						<div class="mdl-card__actions mdl-card--border">

							<form method="post" action="">
								<input type="hidden" name="type" value="<?php echo $donnees['type']; ?>">
								<input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
								<input type="hidden" name="description" value="<?php echo $donnees['description']; ?>">
								<input type="hidden" name="extension" value="<?php echo $donnees['extension']; ?>">
								<button type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
								Lire le PDF
								</button>
							</form>

						</div>
					<?php
					if (isset($id)) {
					?>
						<div class="mdl-card__menu">
							<form method="post" action="../../controller/favoris.php">
								<input type="hidden" name="type" value="<?php echo $donnees['type']; ?>">
								<input type="hidden" name="titre" value="<?php echo $donnees['titre']; ?>">
								<input type="hidden" name="id_user" value="<?php echo $id; ?>">
								<input type="hidden" name="id_file" value="<?php echo $donnees['id']; ?>">                    
								<button type="submit" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
								  <i class="material-icons">favorite</i>
								</button>
							</form>
						</div>
					<?php
					}
					?>
					</div>                 

				<?php
						}
					}                  
				?>                 
			</div>

		</div>
    </main>
</div>