<?php
require_once('model/PostManager.php');

Class adminCommentController  {
	/*  --------------------- All COmment --------------------- */

	public function tableComment()  {
		$postManager = new Cornelissen\Blog\Model\PostManager();
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$posts = $postManager->listPosts();
		$comments = $commentManager->getAllComments();

		require ('view/backend/tableCommentView.php');
	}

		public function deleteComment($commentId)  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$remove = $commentManager->deleteComment($commentId);

		session_start();
		$_SESSION['success'] = 'Le commentaire a bien été supprimé.';

		header('Location: index.php?action=tableComment');
	}

	/*  --------------------- Reported Comment --------------------- */

	public function countReportedComments()  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$count = $commentManager->countReportedComments();

		require('view/backend/adminView.php');
	}

	public function getReportedComments()  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$report = $commentManager->getReportedComments();

		require('view/backend/reportedCommentsView.php');
	}

	public function validateComment($commentId)  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$affectedComment = $commentManager->validateComment($commentId);

		session_start();
		$_SESSION['success'] = 'Le commentaire à bien été validé.';

		header('Location: index.php?action=reportedComments');
	}
	
	public function deleteReportedComment($commentId)  {
		$commentManager = new Cornelissen\Blog\Model\CommentManager();

		$remove = $commentManager->deleteComment($commentId);

		session_start();
		$_SESSION['success'] = 'Le commentaire a bien été supprimé.';

		header('Location: index.php?action=reportedComments');
	}
}
