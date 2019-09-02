<?php

require('controller/frontend/postController.php');
require('controller/frontend/commentController.php');
require('controller/frontend/loginController.php');

require('controller/backend/adminPostController.php');
require('controller/backend/adminCommentController.php');
require('controller/backend/BackendController.php');


$postController = new postController;
$commentController = new commentController;
$loginController = new loginController;

$adminPostController = new adminPostController;
$adminCommentController = new adminCommentController;



try  {
	if (isset($_GET['action']))  {
		if ($_GET['action'] == 'Accueil')  {
			$postController->accueil();
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

/*                       ESPACE IDENTIFICATION                                           */

		elseif ($_GET['action'] == 'login')  {
			if (isset($_POST['pseudo']) && isset($_POST['pw']))  {
				$loginController->login($_POST['pseudo'], $_POST['pw']);
			}
			else  {
				$loginController->formLogin();
			}
		}

/*                      ESPACE ADMINISTRATION                                          */

		elseif ($_GET['action'] == 'admin')  {
			$BackendController = new BackendController;
			$adminCommentController->countReportedComments();
		}
		elseif ($_GET['action'] == 'tablePost')  {
			$BackendController = new BackendController;
			$adminPostController->tablePost();
		}
		elseif ($_GET['action'] == 'tableComment')  {
			$BackendController = new BackendController;
			$adminCommentController->tableComment();
		}
		elseif ($_GET['action'] == 'deletePost') {
			
			$BackendController = new BackendController;
			$adminPostController->deletePost($_GET['id']);
		}
		elseif ($_GET['action'] == 'editPost')  {
			if (isset($_GET['id']) && $_GET['id'] > 0)  {
				$BackendController = new BackendController;
				if (isset($_POST['title']) && isset($_POST['extractContent']) && isset($_POST['contents']))  {
						$adminPostController->editedPost($_POST['title'], $_POST['extractContent'], $_POST['contents'], $_GET['id']);
				}
				else  {
					$adminPostController->editPost($_GET['id']);
				}
			}
			else
			{
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'addPost')  {
			$BackendController = new BackendController;
			if (isset($_POST['title']) && isset($_POST['extractContent']) && isset($_POST['contents']))  {
					$adminPostController->addedPost($_POST['title'], $_POST['extractContent'], $_POST['contents']);
			}
			else  {
				$adminPostController->addPost();
			}
		}
		elseif ($_GET['action'] == 'reportedComments')  {
			$BackendController = new BackendController;
			$adminCommentController->getReportedComments();
		}
		elseif ($_GET['action'] == 'validateComment')  {
			if (isset($_GET['id']))  {
				$adminCommentController->validateComment($_GET['id']);
			}
			else  {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
		elseif ($_GET['action'] == 'deleteComment')  {
			if (isset($_GET['id']))  {
				$adminCommentController->deleteComment($_GET['id']);
			}
			else  {
				throw new Exception('Aucun identifiant de billet envoyé');
			}
		}
	/*                      ESPACE DECONNECTION                                          */
		elseif ($_GET['action'] == 'logout')  {
			$loginController->logout();
		}
		else  {
			$postController->accueil();
		}

	}
	else  {
		$postController->accueil();
	}
}
catch(Exception $e)  {
	echo 'Erreur : ' . $e->getMessage();		
}