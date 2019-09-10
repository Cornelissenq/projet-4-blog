<?php
$title = 'Administration';

ob_start();


?>

<div class="row">
	<div class="offset-lg-2 col-lg-8">
		<form action="index.php?action=login" method="post" class="form-group">
			<label class="form-control" for='pseudo'>Pseudo : </label>
			<input name="pseudo" type="text" id="pseudo">
			<label class="form-control" for='mdp'>Mot de passe : </label>
			<input name="pw" type="password" id="mdp">
			<br/>
			<input type="submit" value="Connexion">
		</form>
	</div>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>