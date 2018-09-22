<?php
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	include('fonction.php');
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ensipartage;charset=utf8','root','');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}
	
	expiration(); //verifie l'expiration de la session

	
?>
<!doctype html>
<html lang="fr">

	<head> 
		<title> EnsiPartage </title>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/bootstrap.min.css"/>
		<link rel="stylesheet" href="CSS/new-header.css"/>  
		<link rel="stylesheet" href="CSS/calendrier.css"/>
		<link rel="stylesheet" href="CSS/style-contact.css"/>
		<link rel="stylesheet" href="CSS/style-traitement.css"/>
		<link rel="stylesheet" href="CSS/style-profilUser.css"/>
		<link rel="stylesheet" href="CSS/accueil.css"/>
        <link rel="stylesheet" href="CSS/animate.css"/>
        

      
	

    	<?php
			if($_SESSION['prefBackground']==1){
				$background=Securite::html($_SESSION['background']);
				?><body background="<?php echo $background;?>" style="background-size:cover;">';
<?php		}else{ ?> <body> <?php 
}
		?>
		<header> 
		<div class="container-fluid">
			<div class="header-wrap">
				<?php 
					include('menu.php');
				?>
			</div>
		</div>
		</header>
