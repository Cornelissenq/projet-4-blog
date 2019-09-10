<?php
$title = 'Billet simple pour l\'Alaska';

ob_start();

while ($post = $posts->fetch())
{
?>
<div class="row">
	<div class="offset-lg-2 col-lg-8">
		<div class="post">
			<div class="titlePost">
				<h4 class="title"> <?= $post['title']; ?> </h4>
				<p class="date"> Le <?= $post['date_creation_fr']; ?> </p>
			</div>
			<div class="contentPost">
				<?= nl2br($post['extract_content']); ?>
			</div>
			<div class="gotoPost">
				<a href='index.php?action=post&amp;id=<?= $post['id'] ?>' class="btn btn-info"><em>Accéder au chapitre <?= $post['id'] ?></em></a>
			</div>
		</div>
	</div>
</div>

<?php
}

$content = ob_get_clean();

require('template.php') 
?>