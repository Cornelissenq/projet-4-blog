<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $title ?> - Blog</title>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css?family=Beth+Ellen&display=swap" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link rel="icon" type="image/png" href="public/images/logo.png" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
  		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
        
		<script src="https://kit.fontawesome.com/a204d33b50.js"></script>
    </head>
        
    <body>
    	<header>
	    	<div class="navbar navbar-default menu">
	    		<div class="container">
			    	<div class="offset-lg-1 col-lg-2 logo">
			    		<a href="index.php?action=Accueil"><img src="public/images/logo.png" alt="logo cornelissen"/></a>
			    	</div>
			    	<div class="col-lg-3 menusite">
			    		<nav>
				    		<ul class="list-unstyled">
				    			<li><a href='index.php?action=Accueil'>Accueil</a></li>
				    			<li><a href='index.php?action=summary'>Articles</a></li>
				    		</ul>
				   		</nav>
			    	</div>
			    </div>		
			</div>
		
			<div class="maintitle">
	    		<h1><?= $title ?></h1>
			</div>	
		</header>
		<?php
		if (isset($_SESSION['success']))  {
		?>
			<div class="row">
				<div id="sessionStorage" class="col-lg-12 green">    	
					<p class="offset-lg-4 col-lg-4"><?php
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
						?>
					</p>
					<button id="closeSstorage" class="green offset-lg-3 col-lg-1"><i class="fas fa-window-close"></i></button>
				</div>
			</div>
		<?php
		}
		if (isset($_SESSION['error']))  {
		?>
			<div class="row">
				<div id="sessionStorage" class="red col-lg-12">    	
					<p class="offset-lg-4 col-lg-4"><?php
						echo $_SESSION['error']; 
						unset($_SESSION['error']);
					?>
					</p>
					<button id="closeSstorage" class="red offset-lg-3 col-lg-1"><i class="fas fa-window-close"></i></button>
				</div>
			</div>
		<?php 
		}
		?>
		<div class="container content">

        	<?= $content ?>
        	
        </div>
        <footer>
        	<div class="container">
	        	<div class="row">
	        		<div class="col-lg-4">
	        			<ul>     				
	        				<li><a href="index.php?action=login">S'identifier</a></li>
	        				<li><a href="index.php?action=admin">Administration</a></li>
	        			</ul>
	        		</div>
	        		<div class="col-lg-4">
	        			<p>Suivez moi !</p>
	        			<div class="row">
		        			<ul class="col-lg-12" id="follow">
		        				<li class="offset-lg-2 col-lg-2"><a href="#" id="fb"><i class="fab fa-facebook"></i></a></li>
		        				<li class="col-lg-4 twitter"><a href="#" id="twitter"><i class="fab fa-twitter-square"></i></a></li>
		        				<li class="col-lg-2"><a href="#" id="insta"><i class="fab fa-instagram"></i></a></li>
		        			</ul>
		        		</div>
	        		</div>
	        		<div class="col-lg-4">
						<ul>
	        				<li><a href="#">Mentions légales</a></li> 
	        				<li><a href="#"><i class="far fa-copyright"></i> Réalisé par Cornelissen Quentin</a></li>
	        			</ul>
	        		</div>
	        	</div>
        	</div>
        </footer>

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="public/js/commentForm.js"></script>
        <script src="public/js/showSessionStorage.js"></script>
    </body>
</html>