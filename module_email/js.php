	<script type="text/javascript">
  		document.getElementsByTagName('form')[0].setAttribute("action","email.php");
  		var d1 = document.getElementById('adresse'); 
		d1.insertAdjacentHTML('afterend', '<input type="hidden" name="token" id="token" value="<?php echo $token; ?>"/>');
	</script>