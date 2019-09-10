<?php  

namespace Cornelissen\Blog\Model;

require_once("model/Manager.php");

Class PostManager extends Manager
{
	public function getThirdPosts()  {
		$db = $this->dbConnect();
		$req = $db->query('SELECT *,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM post ORDER BY date_creation DESC LIMIT 0, 3 ');
		return $req;
	}
	public function getPost($postId)  {
		$db = $this->dbConnect();
		$req = $db->query('SELECT *,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM post WHERE id =" '.$postId.'" ');
		$post = $req->fetch();
		return $post;
	}
	public function listPosts()  {
  		$db = $this->dbConnect();
	    $req = $db->query('SELECT * FROM post ORDER BY id DESC');
	    return $req;
	}

	/*  --------------------- Add post --------------------- */

	public function addedPost($postTitle, $postExtract, $postContent)  {
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO post(title, extract_content, contents) VALUES (?, ?, ?)');
		$addPost = $req->execute(array($postTitle, $postExtract, $postContent));

	}

	/*  --------------------- Edit post --------------------- */

	public function editedPost($postTitle, $postExtract, $postContent, $postId)  {
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = ?, extract_content = ?, contents = ? WHERE id = ?');
		$affectedlines = $req->execute(array($postTitle, $postExtract, $postContent, $postId));

	}

	/*  --------------------- Delete post --------------------- */

	public function deletePost($postId)  {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM post WHERE id = ?');
		$req->execute(array($postId));

	}

}