<?php
    session_start();
    include('headerConnexion.php');

	$userid = Securite::html($_GET['log']);
	$cle = Securite::html($_GET['cle']);
	
	$stmt = $bdd->prepare("SELECT cle,compteactive FROM annexeutilisateur WHERE userid like :userid ");
	$stmt->execute(array(':userid' => $userid));
	$row = $stmt->fetch();
  	$clebdd = $row['cle'];	// Récupération de la clé
   	$actif = $row['compteactive']; // $actif contiendra alors 0 ou 1
	
	if($actif) // Si le compte est déjà actif on prévient
	  {
		 echo "Votre compte est déjà actif !";
	  }
	else // Si ce n'est pas le cas on passe aux comparaisons
	  {
		 if($cle == $clebdd) // On compare nos deux clés	
		   {	 
			  // La requête qui va passer notre champ actif de 0 à 1
			  $stmt = $bdd->prepare("UPDATE annexeutilisateur SET compteactive = 1 WHERE userid like :userid ");
			  $stmt->execute(array(':userid'=>$userid));
			  ?>
					<script>
                        alert("Bienvenu. Votre compte à été activé")
                        window.location.replace("index.php")
                    </script>
				<?php
			  
		   }
		 else // Si les deux clés sont différentes on provoque une erreur...
		   {
			?>
				<script>
                    alert("Erreur ! Votre compte ne peut être activé...")
                    window.location.replace("index.php")
                </script>
			<?php
		   }
	  }
    include('footer.php');
?>