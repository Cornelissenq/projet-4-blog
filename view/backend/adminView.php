<?php
$title = 'Administration';

ob_start();

?>
<div class="adminview">
	<h3> Bienvenu(e) dans l'espace d'administration</h3>
	<div class="row">
		<div class="offset-lg-4 col-lg-4 adminLink">
			<a href="index.php?action=reportedComments">Il y a <span class="nbrReport"><?= $count['nbr']; ?></span> commentaire(s) signalé(s)</a>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-4 adminLink">
					<a href="index.php?action=tablePost">Gestions des articles </a>
				</div>
				<div class="offset-lg-4 col-lg-4 adminLink">
					<a href="index.php?action=tableComment">Gestions des commentaires</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

$content = ob_get_clean();

require('template.php');
?>