<div id="confort"> 
	<script>
		var police_std = "Arial, Helvetica, sans-serif";
		var taille_std = 100;
		var taille_act = 0;
		
		//Initialisation de la police
		function init_aff (police, taille, gras) {
			police_aff(police, false);
			taille_aff(taille, false);
			gras_aff(gras, false);
		}

		//Affichage de la police correspondant au choix de l'utilisateur
		function police_aff (police, save) {
			if (police == "Eido") {
				document.body.style.fontFamily = "Eido, Arial, Helvetica, sans-serif";
			}
			
			else if (police == "OpenDyslexic-Regular") {
				document.body.style.fontFamily = "OpenDyslexic-Regular, Arial, Helvetica, sans-serif";
			}
			
			else {
				document.body.style.fontFamily = police_std;
			}
		}

		//Affichage du fond rouge
		function fondrouge() {
			document.getElementsByTagName("body")[0].setAttribute("class", "democlass"); 
			var x = document.getElementsByTagName("button");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].setAttribute("class", "bouton");
			}
			var x = document.getElementsByTagName("div");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].setAttribute("class", "border1");
			}
		}
		//Affichage du fond noir
		function fondnoir() {
			document.getElementsByTagName("body")[0].setAttribute("class", "democlass2"); 
			var x = document.getElementsByTagName("button");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].setAttribute("class", "bouton1");
			}
			var x = document.getElementsByTagName("div");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].setAttribute("class", "border1");
			}

		}
        //Affichage du fond normal
		function fondnormal() {
			document.getElementsByTagName("body")[0].setAttribute("class", "body");
			var x = document.getElementsByTagName("button");
			var i;
			for (i = 0; i < x.length; i++) {
				x[i].setAttribute("class", "bouton2");
			}
		}
	</script>
</div>
