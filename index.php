<?php

require('controller/frontend/commentController.php');
require('controller/frontend/postController.php');

$postController = new postController;
$commentController = new commentController;

try  {
	if (isset($_GET['action']))  {
		if ($_GET['action'] == 'Accueil')  {
			$postController->Accueil();
		}
		elseif ($_GET['action'] == 'post')  {
			if (isset($_GET['id']) && ($_GET['id'] > 0))  {
				$postController->post();
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
    		$postController->summaryPost();
		}
		elseif ($_GET['action'] == 'report')  {
			if (isset($_GET['idcomment']) && isset($_GET['id']))  {
				if ($_GET['idcomment'] > 0 && $_GET['id'] > 0)  {
					//lancer la fonction de report
					$commentController->reportComment($_GET['idcomment'], $_GET['id']);
				}
				else  {
					throw new Exception('Aucun identifiant de commentaire envoyé');
				}
			}
			
		}
		else  {
			$postController->Accueil();
		}
	}
	else  {
		$postController->Accueil();
	}
}
catch(Exception $e)  {
	echo 'Erreur : ' . $e->getMessage();		
}