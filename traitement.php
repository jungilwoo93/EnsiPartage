


<?php
    
	include('header.php');

	if(isset($_POST['envoi'])){
		
		if(!empty($_POST['nom'])){
			
			$nom = Securite::secure($_POST['nom']);
			
			if(!empty($_POST['prenom'])){
			
				$prenom = Securite::secure($_POST['prenom']);
				if(!empty($_POST['mail'])){
			
					$mail = Securite::secure($_POST['mail']);
					if(!empty($_POST['statut'])){
					
						$statut = Securite::secure($_POST['statut']);
						if(!empty($_POST['objet'])){
							
							$objet = Securite::secure($_POST['objet']);
							if(!empty($_POST['message'])){
								$date = new DateTime();
								$date = $date->format('Y-m-d H:i:s');
								echo $date;
								$message = Securite::secure($_POST['message']);
								echo '<p>'.$prenom.' 
								'.$nom.',merci de nous avoir contacté! </p>';
								echo '<p> Votre message au sujet de "'.$objet.'" sera prochainement traitée.</p>' ;
								echo '<p>Votre statut : '.strtoupper($statut).'</p>';
								echo '<p><a href="mailto:'.$mail.'">'.$mail.'</a></p>';
								echo '<p>Message : '.$message.'</p>';
								
								
								$insertion = $bdd->prepare('INSERT INTO contact VALUES(NULL,"'.$nom.'","'.$prenom.'", "'.$mail.'", "'.$statut.'", "'.$objet.'","'.$date.'","'.$message.'")');
								$insertion->execute();
								
							}
						}
					}
				}
			}
		}
	
	}
	if($_SESSION['tokenDesinscription']){
		session_unset();
		session_destroy();
		header('location:index.php');
	}
?>
<section id="traitement">
	<script>
		alert("Votre message à été envoyé. Retour à l'accueil")
		window.location.replace("accueil.php")
	</script>
</section>
<?php
	include('footer.php');
?>