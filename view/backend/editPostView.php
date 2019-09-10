<?php
$title = 'Modification de l\'article';

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
			<form class="form-group" action="index.php?action=editPost&amp;id=<?= $post['id'] ?>" method="post">
				<label for='title'>Titre :</label>
				<input name="title"  value="<?= $post['title']; ?>" class="form-control texte">
				<label for='contents'>Texte :</label>
				<textarea name="contents" id='texte2' class="form-control texte" rows="30"><?= $post['contents']; ?> </textarea>
				<label for='extractContent'>Extrait (limité à 255 caractères) :</label>
				<textarea name ="extractContent"id="texte3" class="form-control texte" maxlength="255" rows="3"><?= $post['extract_content']; ?></textarea>
				<button type="submit" class="btn btn-info">Modifier </button>
			</form>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();

require('template.php');

?>