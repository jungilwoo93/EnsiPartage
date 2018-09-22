<?php
    session_start();
    include('headerConnexion.php');


//on verifie que c'est une deconnection automatique ou non:
	$sessionexpiree = $_SESSION['expire'];

//On desactive la connexion dans la BDD et update derniere activité
    $id_membre = Securite::secure($_SESSION['id']);
    $date = new DateTime();
    $_SESSION['activity'] = Securite::secure($_SESSION['activity']);
            
    $insertion = $bdd->prepare('UPDATE utilisateur SET etatConnexion = false, derniereActivite=$date WHERE id=&id_membre');
    $insertion->execute();

	// On détruit les variables de notre session
    session_unset ();
	
	// On détruit notre session
    session_destroy ();
	
?>
	<script>
		<?php 
			if(!$sessionexpiree){
				?>
				alert('Vous avez été deconnecté')
				<?php
			} ?>
		window.location.replace("index.php")
	</script>
<?php

    include('footer.php');
?>