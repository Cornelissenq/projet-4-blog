<?php  


// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');



function listPosts()  {
	$postManager = new Cornelissen\Blog\Model\PostManager();
	$posts = $postManager->getPosts();

	require('view/frontend/listPostView.php');
}
function post()  {
	$postManager = new Cornelissen\Blog\Model\PostManager();
	$commentManager = new Cornelissen\Blog\Model\CommentManager();
	
	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require ('view/frontend/postView.php');
}
function addComment()  {
   $commentManager = new Cornelissen\Blog\Model\CommentManager();
   
   $affectedLines = $commentManager->getComment($postId, $pseudo, $comment);

   header('location:index.php?action=post&amp;id='. $postId);
   
}

function summaryPost()  {
    $postManager = new Cornelissen\Blog\Model\PostManager();
    
    $summary = $postManager->summary();
    
    require ('view/frontend/summaryView.php');
}
