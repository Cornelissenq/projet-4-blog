<?php
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

Class postController  {
	public function accueil()  {
		$postManager = new Cornelissen\Blog\Model\PostManager();
		$posts = $postManager->getThirdPosts();

		require('view/frontend/listPostView.php');
	}
	public function post($postId)  {
		$postManager = new Cornelissen\Blog\Model\PostManager();
		$commentManager = new Cornelissen\Blog\Model\CommentManager();
		
		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require ('view/frontend/postView.php');
	}
	public function listPosts()  {
	    $postManager = new Cornelissen\Blog\Model\PostManager();
	    
	    $posts = $postManager->listPosts();
	    
	    require ('view/frontend/summaryView.php');
	}
}
