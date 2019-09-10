<?php

require_once('model/CommentManager.php');


Class commentController
{
	
	public function addComment($postId,$pseudo,$comment)  {
  		$commentManager = new Cornelissen\Blog\Model\CommentManager();
   
   		$affectedLines = $commentManager->addComment($postId, $pseudo, $comment);
   		session_start();
		$_SESSION['success'] = 'Le commentaire à bien été ajouté.';

   		header('Location: index.php?action=post&id='. $postId);
   
	}
	public function reportComment($commentId,$postId)  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$affectedComment = $commentManager->reportComment($commentId, $postId);
		session_start();
		$_SESSION['success'] = 'Le commentaire à bien été signalé.';

		header('Location: index.php?action=post&id='. $postId);
	}
}



