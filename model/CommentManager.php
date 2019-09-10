<?php

namespace Cornelissen\Blog\Model;

require_once("model/Manager.php");

Class CommentManager extends Manager  
{
	/*  --------------------- Show comments --------------------- */

	public function getComments($postId)  
	{
		$db = $this->dbConnect();
		
		$comments = $db->prepare('SELECT *,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM comments WHERE id_article = ? AND report = "0" ORDER BY date_creation_fr DESC');
		$comments->execute(array($postId));

		return $comments;
	}
	public function getAllComments()  
	{
		$db = $this->dbConnect();
		
		$comments = $db->query('SELECT *,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM comments WHERE report = "0" ORDER BY id_article DESC');

		return $comments;
	}

	/*  --------------------- add comment --------------------- */

	public function addComment($postId, $pseudo, $comment)  {
		$db = $this->dbConnect();
	   
		$comments = $db->prepare('INSERT INTO comments(id_article, pseudo, comment, report) VALUES(?, ?, ?, "0")');
		$addComment = $comments->execute(array($postId, $pseudo, $comment));

   }

	/*  --------------------- Delete comment --------------------- */

	public function deleteComment($commentId)  {
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute(array($commentId));
	}

   /*  --------------------- Reported comments --------------------- */

   public function reportComment($commentId, $postId)  {
   		$db = $this->dbConnect();

   		$report = $db->prepare('UPDATE comments SET report = "1" WHERE id= ? AND id_article = ?');
   		$reportedComment = $report->execute(array($commentId, $postId));

   }
   public function countReportedComments()  {
   		$db = $this->dbConnect();

   		$count = $db->query('SELECT COUNT(*) AS nbr FROM comments WHERE report = "1"');
   		$number = $count->fetch();

   		return $number;
   }
   	public function getReportedComments()  
	{
		$db = $this->dbConnect();
		
		$comments = $db->query('SELECT *,DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin\') AS date_creation_fr FROM comments WHERE report = "1" ORDER BY id_article DESC');

		return $comments;
	}
	public function validateComment($commentId)  {
		$db = $this->dbConnect();

   		$validate = $db->prepare('UPDATE comments SET report = "0" WHERE id= ?');
   		$validateComment = $validate->execute(array($commentId));

	}

}