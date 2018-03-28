<?php
session_start();
//definition de l'url en fonction du mode activé (design ou accessibility)
if ($_POST['mode'] == "design") {
	header('location:view/design/index.php');
}

else if ($_POST['mode'] == "access") { 
	header('location:view/accessibility/index.php');
}

else {
	header('location:view/design/index.php');
}
            
?>
