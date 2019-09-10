<?php
require_once('model/UserManager.php');

Class loginController  {
	public function formLogin()  {
		require ('view/frontend/loginAdminView.php');
	}
	public function login($pseudo, $mdp)  {
		$userManager = new Cornelissen\Blog\Model\UserManager();

		$result = $userManager->login($pseudo, $mdp);


		if ($result)  {
			session_start();
			$_SESSION['success'] = 'Vous êtes bien identifié.';
			$_SESSION['id'] = $result['id'];
			$_SESSION['pseudo'] = $result['pseudo'];
			header('Location:index.php?action=admin');
		}
		else  {
			session_start();
			$_SESSION['error'] = 'Mauvais identifiants, merci de réiterer votre demande.';

			header('Location:index.php?action=login');
		}

	}

	public function logout()  {

		session_start();
		$_SESSION = array();
		session_destroy();
		header('Location:index.php?action=Accueil');
	}
}