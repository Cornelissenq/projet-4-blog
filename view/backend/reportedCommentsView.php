<?php
$title = 'Gérer les commentaires signalés';

ob_start();

?>

<div class="row">
	<div class="col-lg-12 post">
		<div class="row">
			<div class="col-lg-4 paneladd">
				<a class="panel" href="index.php?action=admin"><i class="fas fa-chevron-circle-left"></i> Interface d'administration</a>
			</div>
		</div>
		<div class="row">
			<table class="table table-striped table-condensed">
				<thead>
					<tr>

						<th>Pseudo</th>
						<th>Commentaire</th>
						<th> </th>
						<th> </th>
					</tr>
				</thead>
				<tbody>
				<?php
				while ($comment = $report->fetch())  {
				?>
					<tr>
						<th class=""><?= $comment['pseudo']; ?></th>
						<th class=""><?= $comment['comment']; ?></th>
						<th class=""><a class="panel" href="index.php?action=validateComment&amp;id=<?=$comment['id']; ?>">Valider</a></th>
						<th class="bulle"><a class="panel" onclick="return confirm('Voulez-vous supprimer cet article ?');" href="index.php?action=deleteComment&amp;id=<?=$comment['id']; ?>"> <i class="far fa-trash-alt"></i> </a></th>
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