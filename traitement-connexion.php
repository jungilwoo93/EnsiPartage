<?php
    include('headerConnexion.php');
	

	$mdp = $_POST['mdp']; 
	$mail = Securite::html(Securite::secure($_POST['mail']));

        
       
	$insertion = $bdd->prepare('SELECT * FROM utilisateur WHERE mail="'.$mail.'"');
	$insertion->execute();

	// vérification des donnees dans la base
	if(!empty($_POST['mail']) && !empty($_POST['mdp'])){
		$data = $insertion->fetch();
		$datamdp = Securite::html($data['mdp']);
		$datamail = Securite::html($data['mail']);




	}
		
    if($datamail == $mail && password_verify($_POST['mdp'], $data['mdp'])){ //le visiteur a un compte
		session_start(); //ouverture d'une session
        $_SESSION['id'] = $data['Id'];
        $_SESSION['nom'] = $data['nom'];
        $_SESSION['prenom'] = $data['prenom'];
        $_SESSION['statut'] = $data['statut'];
        $_SESSION['mail'] = $data['mail'];
        $_SESSION['adresse'] = $data['adresse'];
        $_SESSION['dateNaissance'] = $data['DateNaissance'];
        $_SESSION['genre'] = $data['Genre'];        
        $_SESSION['etatConnexion'] = 'true';
		$_SESSION['avatar'] = $data['Avatar'];
       	$_SESSION['tokenDesinscription']='false';
		$_SESSION['prefAdresse']=$data['prefAffichAdresse'];
		$_SESSION['prefDate']=$date['prefAffichDateNaissance'];
		
		
        $_SESSION['activity'] = time();
		$_SESSION['expire']=false;

		$annexe = $bdd->prepare('SELECT * FROM annexeutilisateur WHERE userid="'.$_SESSION['id'].'"');
		$annexe->execute();
		$dataannexe= $annexe->fetch();
		$_SESSION['prefBackground']=$dataannexe['prefAffichBackground'];
		$_SESSION['background']=$dataannexe['background'];
		$_SESSION['compteactive']=$dataannexe['compteactive'];



			if(!($_SESSION['compteactive'] == 1)) // Si $actif est égal à 1, on autorise la connexion
 			 {	
				?><script>
					alert("Votre compte n'est pas activé")
					window.location.replace("index.php")
				</script><?php 
			}

            
        $majConnect = $bdd->prepare('UPTADE utilisateur SET etatConnexion=true WHERE mail=:mail');
 
		$majConnect->execute(array('mail'=> Securite::secure($_POST['mail'])));

       	header('Location: accueil.php'); //redirige le user dans accueil.php
    }else { // le visiteur n est pas reconnu
		?>
	<script>
		alert('Vérifiez les données saisies où inscrivez vous si vous avez pas de compte')
		window.location.replace("index.php")
	</script>
<?php
	}  //close of the last else
	
	include('footer.php');
?>