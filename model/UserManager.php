<?php

namespace Cornelissen\Blog\Model;

require_once('model/Manager.php');

Class UserManager extends Manager  
{
	public function login($pseudo, $pw)  {
		$db = $this->dbConnect();
		$login = $db->prepare('SELECT * FROM user WHERE pseudo = ? AND pw = ?');
		$login->execute(array($pseudo,sha1($pw)));
		$result = $login->fetch();

		return $result;	
	}
}