<?php
$title = 'Création de l\'article';

ob_start();

?>
<div class="row">
	<div class="offset-lg-2 col-lg-3 btnReturn">
		<a class='btn' href="index.php?action=tablePost">Retour à la liste des articles</a>
	</div>
</div>
<div class="row">
	<div class="offset-lg-2 col-lg-8">
		<div class="post">
			<form class="form-group" action="index.php?action=addPost" method="post">
				<label for='title'>Titre :</label>
				<input name="title" value="" class="form-control">
				<label for='contents'>Texte :</label>
				<textarea name="contents" id='texte' class="form-control" rows="30"></textarea>
				<label for='extractContent'>Extrait (limité à 255 caractères) :</label>
				<textarea name ="extractContent"id="texte1" class="form-control" maxlength="255" rows="3"></textarea>
				<button type="submit" class="btn btn-info">Ajouter </button>
			</form>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();

require('template.php');

?>