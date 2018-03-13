<?php
session_start();
$token = uniqid(rand(), true);
$_SESSION['token'] = $token;
$_SESSION['token_time'] = time();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formulaire</title>
</head>
<body>

	<form method="POST">
		<div class="row">
			<label for="nom">Nom : </label>
			<input type="text" name="nom"  id="nom" />
		</div>
		<div class="row">
			<label for="prenom">Prénom : </label>
			<input type="text" name="prenom"  id="prenom" />
		</div>
		<div class="row">
			<label for="email">E-mail : </label>
			<input type="email" name="email" id="email" />
		</div>
		<div class="row">
			<label for="ue">UE concernée : </label>
			<select name="ue" id="ue">
				<option value=""></option>
				<option value="UE219">UE219</option>
				<option value="UE223">UE223</option>
				<option value="UE235">UE235</option>
			</select>
		</div>
		<div class="row">
			<label for="adresse">Adresse postale : </label>
			<textarea id="adresse" name="adresse"></textarea>
		</div>
		<div class="row">
			<input type="submit" value="Envoyer le formulaire" />
		</div>
	</form>
	<?php
		include "js.php";
	?>
</body>
</html>