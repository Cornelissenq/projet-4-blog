<?php
require_once('model/PostManager.php');

Class adminPostController  {
	
	public function tablePost()  {
		$postManager = new Cornelissen\Blog\Model\PostManager();

		$posts = $postManager->listPosts();

		require ('view/backend/tablePostView.php');
	}
/*  --------------------- Add --------------------- */

	public function addPost()  {
		$postManager = new Cornelissen\Blog\Model\PostManager();
		require('view/backend/addPostView.php');
	}

	public function addedPost($postTitle, $postExtract, $postContent)  {
		$postManager = new Cornelissen\Blog\Model\PostManager();

		$add = $postManager->addedPost($postTitle, $postExtract, $postContent);

		session_start();
		$_SESSION['success'] = 'L\'article a bien été ajouté.';

		header('Location: index.php?action=tablePost');
	}

/*  --------------------- Edit --------------------- */

	public function editPost($postId)  {
		$postManager = new Cornelissen\Blog\Model\PostManager();

		$post = $postManager->getPost($postId);

		require('view/backend/editPostView.php');
	}

	public function editedPost($postTitle, $postExtract, $postContent, $postId)  {
		$postManager = new Cornelissen\Blog\Model\PostManager();

		$post = $postManager->editedPost($postTitle, $postExtract, $postContent, $postId);

		session_start();
		$_SESSION['success'] = 'L\'article a bien été modifié.';
		header('Location: index.php?action=tablePost');
	}
/*  --------------------- Delete --------------------- */


	public function deletePost($postId)  {
		$postManager = new Cornelissen\Blog\Model\postManager();

		$remove = $postManager->deletePost($postId);

		session_start();
		$_SESSION['success'] = 'L\'article a bien été supprimé.';

		header('Location: index.php?action=tablePost');
	}

}