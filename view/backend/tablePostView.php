<?php
$title = 'Gérer les articles';

ob_start();

?>

<div class="row">
	<div class="col-lg-12 post">
		<div class="row">
			<div class="col-lg-4 paneladd">
				<a class="panel" href="index.php?action=admin"><i class="fas fa-chevron-circle-left"></i> Interface d'administration</a>
			</div>
			<div class="offset-lg-5	col-lg-3 paneladd">
				<a class="panel" href="index.php?action=addPost"><i class="fas fa-plus-circle"></i> Ajouter un article</a>
			</div>
		</div>
		<div class="row">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>
						<th>Titre</th>
						<th>Extrait</th>
						<th> </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
				<?php
				while ($post = $posts->fetch())  {
				?>
					<tr>
						<th class=""><a class="linkpost" href="index.php?action=post&amp;id=<?=$post['id'];?>" target="_blank"><?= $post['title']; ?></th>
						<th class=""><?= $post['extract_content']; ?></th>
						<th class=""><a class="panel" href="index.php?action=editPost&amp;id=<?=$post['id']; ?>">Modifier</a></th>
						<th class="bulle"><a class="panel" onclick="return confirm('Voulez-vous supprimer cet article ?');" href="index.php?action=deletePost&amp;id=<?=$post['id']; ?>"><i class="far fa-trash-alt"></i></i></a></th>
					</tr>
				<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php

$content = ob_get_clean();

require('template.php');
?>