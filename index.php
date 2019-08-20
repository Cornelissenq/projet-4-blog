<?php

require('controller/frontend/postController.php');
require('controller/frontend/commentController.php');
require('controller/frontend/loginController.php');

require('controller/backend/adminPostController.php');
require('controller/backend/adminCommentController.php');


$postController = new postController;
$commentController = new commentController;
$loginController = new loginController;

$adminPostController = new adminPostController;
$adminCommentController = new adminCommentController;

try  {
	if (isset($_GET['action']))  {
		if ($_GET['action'] == 'Accueil')  {
			$postController->Accueil();
		}
		elseif ($_GET['action'] == 'post')  {
			if (isset($_GET['id']) && ($_GET['id'] > 0))  {
				$postController->post($_GET['id']);
			}
			else  {
				throw new Exception ('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'addComment')  {
			if (isset($_GET['id']) && $_GET['id'] > 0)  {
				if (!empty($_POST['pseudo']) && (!empty($_POST['comment'])))  {
					$commentController->addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
				}
				else  {
					throw new Exception ('Tout les champs ne sont pas remplis !');
				}
			}
			else  {
				throw new Exception('Aucun identifiant de billet envoyé');
				
			}
		}
		
		elseif ($_GET['action']  == 'summary')  {
    		$postController->listPosts();
		}
		elseif ($_GET['action'] == 'report')  {
			if (isset($_GET['idcomment']) && isset($_GET['id']))  {
				if ($_GET['idcomment'] > 0 && $_GET['id'] > 0)  {
					$commentController->reportComment($_GET['idcomment'], $_GET['id']);
				}
				else  {
					throw new Exception('Aucun identifiant de commentaire envoyé');
				}
			}	
		}
		elseif ($_GET['action'] == 'login')  {
			if (isset($_POST['pseudo']) && isset($_POST['pw']))  {
				$loginController->login($_POST['pseudo'], $_POST['pw']);
			}
			else  {
				$loginController->formLogin();
			}
		}
		elseif ($_GET['action'] == 'admin')  {
			$loginController->tableAdmin();
		}
		elseif ($_GET['action'] == 'table')  {
			$loginController->tableAdmin();
		}
		elseif ($_GET['action'] == 'deletePost') {
			$adminPostController->deletePost($_GET['id']);
		}
		elseif ($_GET['action'] == 'editPost')  {
			$adminPostController->editPost($_GET['id']);
		}
		elseif ($_GET['action'] == 'editedPost')  {
			if (isset($_GET['id']) && $_GET['id'] > 0)  {
				if (isset($_POST['title']) && isset($_POST['extractContent']) && isset($_POST['contents']))  {
					$adminPostController->editedPost($_POST['title'], $_POST['extractContent'], $_POST['contents'], $_GET['id']);
				}
				else  {
					throw new Exception('Le formulaire est mal rempli, merci de re-saisir la modification.');
				}
			}
			else  {
				throw new Exception('Aucun identifiant de billet envoyé');
			}

			
		}
		else  {
			$postController->Accueil();
		}

	}
	else  {
		$loginController->tableAdmin();
	}
}
catch(Exception $e)  {
	echo 'Erreur : ' . $e->getMessage();		
}