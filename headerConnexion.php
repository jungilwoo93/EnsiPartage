<?php
	include('fonction.php');
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ensipartage;charset=utf8','root','');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	
?>
<!doctype html>
<html lang="fr">

	<head> 
		<title> EnsiPartage </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="CSS/style-index.css"/>
		<link rel="stylesheet" href="CSS/new-header.css"/>
		<link rel="stylesheet" href="CSS/style-contact.css"/>
		<link rel="stylesheet" href="CSS/style-traitement.css"/>
		<link rel="stylesheet" href="CSS/style-profilUser.css"/>
        <link rel="stylesheet" href="CSS/animate.css"/>

	</head>
	
	<body background="image/ocean.jpg" style="background-size:cover;">
	
		<header> 
			<div class="container-fluid"  style="text-align: center;">
				<?php 
					include('menu.php');
				?>
				</div>
			</div>
		</header>
	