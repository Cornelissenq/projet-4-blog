<?php
$title = $post['title'];

ob_start();

if (isset($_SESSION['success']))  {
?>
<div class="row">
	<div id="sessionStorage" class="col-lg-12">    	
		<p class="offset-lg-4 col-lg-4"><?php
			echo $_SESSION['success']; 
			session_destroy();
			?>
		</p>
		<button id="closeSstorage" class="offset-lg-3 col-lg-1"><i class="fas fa-window-close"></i></button>
	</div>
</div>
<?php 
}

?>

<div class="row">
	<div class="offset-lg-2 col-lg-8">
		<div class="post">
			<div class="titlePost">
				<p class="date"> Le <?= $post['date_creation_fr']; ?> </p>
			</div>
			<div class="contentPost">
				<p class="content"> <?= nl2br($post['contents']); ?> </p>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="offset-lg-2 col-lg-8">
		<div class="headerComment post">
			<h4>Commentaires :</h4>
			<div class="comment">
				<button id="enableForm" class="btn btn-primary btn-lg"> Ajouter un commentaire </button>
				<div id="commentForm">
					<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
						<div class="form-group">
			    			<label for="pseudo"> Votre pseudo :</label>
			    			<input type="text" id="pseudo" name="pseudo" class="form-control"></input>
			    		</div>
			    		<div class="form-group">
			    			<label for="comment"> Votre commentaire :</label>
			    			<textarea id="comment" name="comment"  class="form-control"></textarea>
			    		</div>
			    		<input type="submit" value="Envoyer" class="btn btn-info">
					</form>
				</div>
			</div>
<?php
while ($comment = $comments->fetch())
{
?>
			<div class="comments">
				<div class="row titlecomment">

					<p class="col-12 col-lg-8 pseudodate"> Écrit par <em><?= $comment['pseudo'] ?></em> <span class="datecomment date"> le <?= $comment['date_creation_fr'] ?> </em></p>
					<a class="offset-4 col-4 offset-lg-2 col-lg-2  reportbouton" onclick="return confirm('Voulez-vous signaler ce commentaire ?');" href="index.php?action=report&amp;idcomment=<?= $comment['id'] ?>&amp;id=<?= $comment['id_article'] ?>"><i class="fas fa-exclamation-triangle"></i> Signaler</a>
				</div>
				<div class="contentComment">
					<p> <?=  $comment['comment'] ?> </p>
				</div>
			</div>
<?php
}
?>	
		</div>
	</div>
</div>





<?php
 
$content = ob_get_clean();

require ('template.php');

?>