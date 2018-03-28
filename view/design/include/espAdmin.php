        <div class="mdl-layout__tab-panel" id="admin">
          <h3>Espace d'administration</h3>
        	<div id="espA1">
        		<div class="espA2">
					<h4 class="centitre">Gestion des utilisateurs</h4>
        			<div class="espA3">
        				<h5 class="centitre">Validation utilisateurs</h5>
        				<div class="espA4 mdl-shadow--4dp">
        					<?php 
        						$validation=new ModeleValidation();  
								$valider=$validation->validUsrDesign(); 
							?>
        				</div>
        			</div>
        			<div class="espA3">
        				<h5 class="centitre">Suppression utilisateurs</h5>
        				<div class="espA4 mdl-shadow--4dp">
        					<?php 
							    $suppression=new ModeleUtilisateur($id);
							    $supprimer=$suppression->suppUsrDesign();
							?>
        				</div>
        			</div>
        		</div>
        		<div class="espA2">
					<h4 class="centitre" id="gFich">Gestion des fichiers</h4>
        			<div class="espA3">
        				<h5 class="centitre">Validations fichiers</h5>
        				<div class="espA4 mdl-shadow--4dp">
							<?php include ('valMedDes.php'); ?>
        				</div>
        			</div>
        			<div class="espA3">
        				<h5 class="centitre">Suppression fichiers</h5>
        				<div class="espA4 mdl-shadow--4dp">
						  <?php include('../../controller/dosMedDes.php'); ?>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>