<?php

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
		<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
		<script type="text/javascript">
			tinyMCE.init({
				// type de mode
				mode : "textareas",		
				// en mode avancé, cela permet de choisir les plugins
				theme : "advanced", 
				// langue
				language : "fr", 
				// liste des plugins
				plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,preview,media,contextmenu,paste,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

				// les outils à afficher
				theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
				theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,|,preview,|,forecolor,backcolor",
				theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl",
				theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,pagebreak,restoredraft",
				
				// emplacement de la toolbar
				theme_advanced_toolbar_location : "top",  
				// alignement de la toolbar
				theme_advanced_toolbar_align : "left",
				// positionnement de la barre de statut
				theme_advanced_statusbar_location : "bottom", 
				// permet de redimensionner la zone de texte
				theme_advanced_resizing : false,

				// taille disponible
				theme_advanced_font_sizes: "10px,11px,12px,13px,14px,15px,16px,17px,18px,19px,20px,21px,22px,23px,24px,25px", 
				// couleur disponible dans la palette de couleur
				theme_advanced_text_colors : "33FFFF, 007fff, ff7f00", 
				// balise html disponible
				theme_advanced_blockformats : "h1, h2,h3,h4,h5,h6",
				// class disponible
				theme_advanced_styles : "Tableau=textTab;TableauSansCadre=textTabSansCadre;", 
			});
		</script>
    </head>
        
    <body>
    	<header>
	    	<div class="navbar navbar-default menu">
	    		<div class="container">
			    	<div class="offset-lg-1 col-lg-2 logo">
			    		<a href="index.php?action=admin"><img src="public/images/logo.png" alt="logo cornelissen"/></a>
			    	</div>
			    	<div class="col-lg-6 menusite">
			    		<nav>
				    		<ul class="list-unstyled">
				    			<li><a href='index.php?action=tablePost'>Articles</a></li>
				    			<li><a href='index.php?action=tableComment'>Commentaires</a></li>
				    			<li><a href='index.php?action=logout'>Déconnection</a></li>
				    			<li><a href='index.php?action=Accueil'>Retour au site</a></li>
				    		</ul>
				   		</nav>
			    	</div>
			    </div>		
			</div>
		
			<div class="mainAdmintitle">
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
	<div id="sessionStorage" class="col-lg-12 red">    	
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

        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="public/js/commentForm.js"></script>
        <script src="public/js/showSessionStorage.js"></script>
    </body>
</html>