<?php

Class BackendController  {
	public function __construct()  {
		session_start();
		if ($_SESSION['id'])  {
			
		}
		else  {
			header('Location: index.php?action=login');
		}
	}
}