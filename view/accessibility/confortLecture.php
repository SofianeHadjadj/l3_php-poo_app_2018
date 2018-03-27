
                    <div id="confort">  
                    	<form method="post" action="" style="display: inline-block">
                    		<input type="hidden" name="choixFunc" value="fondrouge" style="display: inline-block">
                                <input alt="fond rouge" type="image" name="submit" src="images/A3.png" style="display: inline-block"/>
                        </form>  
                    	<form method="post" action="" style="display: inline-block">
                    		<input type="hidden" name="choixFunc" value="fondnoir" style="display: inline-block">
                       		<input alt="fond noir" type="image" name="submit" src="images/A4.png" style="display: inline-block"/>
                        </form>  
                    	<form method="post" action="" style="display: inline-block">
                    		<input type="hidden" name="choixFunc" value="fondnormal" style="display: inline-block">
                       		<input alt="fond normal" type="image" name="submit" src="images/A1.png" style="display: inline-block"/>
                        </form>

                        <form method="post" action="../../index.php" style="display: inline-block">
                            <input type="hidden" name="mode" value="design" style="display: inline-block">
                            <input type="submit" value="!! Version Design !!">
                        </form>
                           

                        <br>
                        
                        <form method="post" action="" style="display: inline-block">
                            <input type="hidden" name="choixPol" value="police_aff('Eido', true)">
                            <input alt="police eido" type="image" name="submit" src="images/Eido.png" onclick="police_aff('Eido', true)" style="display: inline-block"/>
                        </form>
                        <form method="post" action="" style="display: inline-block">
                            <input type="hidden" name="choixPol" value="police_aff('OpenDyslexic-Regular', true)">
                            <input alt="police opendyslexyc" type="image" name="submit" src="images/opendyslexic.png" onclick="police_aff('OpenDyslexic-Regular', true)" style="display: inline-block"/>
                        </form>
                        <form method="post" action="" style="display: inline-block">
                            <input type="hidden" name="choixPol" value="police_aff('std', true)">
                            <input alt="police standard" type="image" name="submit" src="images/Standard.png" onclick="police_aff('std', true)" style="display: inline-block"/>
                        </form>
                        
                        

                    <script>
	var police_std = "Arial, Helvetica, sans-serif";
var taille_std = 100;
var taille_act = 0;

function init_aff (police, taille, gras) {
	police_aff(police, false);
	taille_aff(taille, false);
	gras_aff(gras, false);
}

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
	
	if (save) {
		var xhttp = new XMLHttpRequest();
		xhttp.open("POST", "reg_aff.php", true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.send("police=".concat(police));
	}
}

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

function myFunction3() {
    document.getElementsByTagName("img")[2].setAttribute("class", "image1");

}

function myFunction4() {
    document.getElementsByTagName("img")[2].setAttribute("class", "image2");

}

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
