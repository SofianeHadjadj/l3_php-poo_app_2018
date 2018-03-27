<?php
session_start();

if ($_POST['mode'] == "access") {
	header('location:view/accessibility/index.php');
}
else if ($_POST['mode'] == "design") {
	header('location:view/design/index.php');
}
else {
	header('location:view/accessibility/index.php');
}
            
?>
