<?php
  session_start();
  session_destroy(); // fermer la sessions
  header('refresh:3;url=../view/design/index.php'); // redirection vers l'accueil
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Capture</title>		
		<link rel="shortcut icon" href="../view/design/assets/images/favicon.png">
		<!-- Liens des bibliothèques en ligne -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<!-- Liens des bibliothèques locales -->
		<script src="../view/design/assets/js/jquery-3.2.1.min.js"></script>
		<script src="../view/design/assets/js/material.min.js"></script>
		<link rel="stylesheet" href="../view/design/assets/css/mdpp.min.css">
		<link rel="stylesheet" href="../view/design/assets/css/styles.css">
		<link rel="stylesheet" href="../view/design/assets/css/carousel.css">
		
		<style type="text/css">
			.perspective{
				background: url(../view/design/assets/images/doorBorder.png);
				background-repeat: no-repeat;
				background-position: center center;
				position: relative;
				display: inline;
				float: left;
				height: 274px;
				width: 147px;
				margin: 20px;
				margin-left: 0px;
				-webkit-perspective: 450;
				border-radius: 3px;
				box-sizing: border-box;
			}
				  
			.thumb{
				background: url(../view/design/assets/images/ClassDoor.png);
				background-repeat: no-repeat;
				background-position: center center;
				width: 147px;
				height: 274px;
				position: absolute;
				box-sizing: border-box;
				border-radius: 3px;
				box-shadow: 0 0 0 10px rgba(255, 255, 255, .0) inset;
				transition: 1s transform linear;
				transform-origin: left;
				cursor: pointer;
			}
				  
		    .thumbOpened{
			    transform: rotateY(-90deg);
			    transform-origin: 8px;
			    transition: .5s linear;
		    }

				.alert {
					padding: 8px 35px 8px 14px;
					margin-bottom: 20px;
					text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
					background-color: #fcf8e3;
					border: 1px solid #fbeed5;
					-webkit-border-radius: 4px;
					-moz-border-radius: 4px;
					border-radius: 4px;
					color: #000;				  
					transform-origin: left;
					transform:rotateY(180deg);
					opacity:0;
					animation-name: go;
					animation-duration: 0.5s;
					animation-timing-function: ease-in-out;
					animation-fill-mode: forwards;
					animation-delay: 0.5s;
					width:350px;
				}
				
				@keyframes go {
				    100%{
					opacity:1;
					transform:rotateY(0deg);
				    }
				}
				
				.demo-card-wide.mdl-card {
				    width: 512px;
				}
				
				.demo-card-wide > .mdl-card__title {
				  
				}
				
				.demo-card-wide > .mdl-card__menu {
				    color: #fff;
				}
				
				#element {
				    margin-top: 40vh; /* poussé de la moitié de hauteur de viewport */
				    transform: translateY(-40%); /* tiré de la moitié de sa propre hauteur */
				}
				
				#user{
					-moz-box-shadow: 2px 2px 5px 0px #656565;
					-webkit-box-shadow: 2px 2px 5px 0px #656565;
					-o-box-shadow: 2px 2px 5px 0px #656565;
					box-shadow: 2px 2px 5px 0px #656565;
					filter:progid:DXImageTransform.Microsoft.Shadow(color=#656565, Direction=134, Strength=5);
					cursor:default;
					z-index: 9999;
				}
		</style>
	</head>

	<body style="background-color: #F5F5F5">
		<div class="demo-layout mdl-layout mdl-layout--fixed-header">
		    <div class="demo-ribbon mdl-shadow--4dp" style="background-color: #3C3E42">
		        <h2 style="text-align: center;color: white">Vous avez &eacute;t&eacute; d&eacute;connect&eacute;(e) !</h2>
		    </div>
			
		    <main class="demo-main mdl-layout__content">
				<div id="element" class="demo-card-wide mdl-card mdl-shadow--2dp  mdl-grid" style="height: 500px">
					<div style="padding-top: 80px;margin-left: auto;margin-right: auto;">
						<div class="perspective">
							<div class="thumb thumbOpened">
							</div>
						</div>
					</div>
				  
					<div class="mdl-button  mdl-button--fab mdl-button--colored" id="user" style="background-color: #3F51B5">
						<span id="Crono" style="padding-bottom: -50px !important">3</span>
					</div>
				</div>
		    </main>
		</div>       

		<script type="text/javascript">
			// initialise le temps
			var cpt = 3;			   
			timer = setInterval(function(){
				if(cpt>0) { // si on a pas encore atteint la fin
					--cpt; // décrémente le compteur
					var Crono = document.getElementById("Crono"); // récupère l'id
					var old_contenu = Crono.firstChild; // stock l'ancien contenu
					Crono.removeChild(old_contenu); // supprime le contenu
					var texte = document.createTextNode(cpt); // crée le texte
					Crono.appendChild(texte); // l'affiche
				}
				else { // sinon brise la boucle
					clearInterval(timer);
				}
			}, 1020);
	    </script>  
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('.thumb').removeClass('thumbOpened');
			});
		</script>
	</body>
</html>