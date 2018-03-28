<?php  
	$_SESSION['id_user']=$_POST['id_user'];
	$_SESSION['id_file']=$_POST['id_file'];
	$ajoutfav=new ModeleFichier();
	$favoris=$ajoutfav->favoris();
?>