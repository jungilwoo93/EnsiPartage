<?php
	session_start();
	
    include('headerConnexion.php');

    $mdp = Securite::html($_POST['mdp']);
    $mdpConfirm = Securite::html($_POST['mdpConfirm']);
	// on regarde si le mail existe déja
    $mail = Securite::secure($_POST['mail']);
 	$rep = $bdd->prepare('SELECT mail FROM utilisateur WHERE mail="'.$mail.'"');
	$rep->execute();
	$nbr=$rep->rowCount();//verifier si ce n'est pas vide
				?>
			<script>
				alert($nbr)
				window.location.replace("index.php")
			</script>
			<?php
	if($mdp != $mdpConfirm) {//mot de passe différent
			?>
			<script>
				alert('les mots de passes ne correspondent pas.')
				window.location.replace("index.php")
			</script>
			<?php
	}else {
		if($nbr==0){
            $mdphash = cryptage($mdp);
            $nom=Securite::secure($_POST['nom']);
            $prenom=Securite::secure($_POST['prenom']);           
            $statut=$_POST['statut'];
            $adresse=Securite::secure($_POST['adresse']);
            $dateNaissance=Securite::secure($_POST['dateNaissance']);
            $genre=Securite::secure($_POST['genre']);


			 $insert= $bdd->prepare('INSERT INTO utilisateur VALUES (NULL, "'.$nom.'", "'.$prenom.'", "'.$statut.'", "1.0.0", "'.$mdphash.'", "'.$mail.'", 1, 1, "'.$adresse.'", "'.$dateNaissance.'", "'.$genre.'", "/image/profilIcon.png", 0, NULL)');
			$insert->execute();
			
			
			$newid = $bdd->prepare('SELECT id FROM utilisateur WHERE mail="'.$mail.'"'); 
			$newid->execute();
			$dataid=$newid->fetch();

			if($statut=='etudiant'){
				$statutgrp = 1;
			}else if($statut == 'enseignant'){
				$statutgrp = 2;
			}else if($statut == 'ancien'){
				$statutgrp = 3;
			}else if($statut == 'personnel'){
				$statutgrp = 4;
			}else if($statut == 'externe'){
				$statutgrp = 5;
			}
			
			$insertgroup= $bdd->prepare('INSERT INTO appartenance VALUES (NULL, "'.$dataid['id'].'","'.$statutgrp.'")');
			$insertgroup->execute();
			$insertgroupuser= $bdd->prepare('INSERT INTO appartenance VALUES (NULL, "'.$dataid['id'].'",0)');
			$insertgroupuser->execute();
			
			// Génération aléatoire d'une clé d'activation
			$cle = md5(microtime(TRUE)*100000);
			
			$stmt = $bdd->prepare("INSERT INTO annexeutilisateur (id, userid, cle, compteactive, background, prefAffichBackground) VALUES (NULL, :userid, :cle, '0', '/image/sakura.jpg', '0')");
			$stmt->execute(array('userid'=>$dataid['id'],'cle'=>$cle));
			
			mailactivation($mail,$cle,$dataid['id']);
			
			?>
			<script>
				alert("Vous avez bien été enregistré. Un mail vous à été envoyé a l'adresse de l'inscription. Pensez à verifier dans vos Courriers indesirables.")
				window.location.replace("index.php")
			</script>
			<?php
			
		} else {
			?>
			<script>
				alert('Votre Email est déjà utilisé pour un compte')
				window.location.replace("index.php")
			</script>
			<?php
		}
	}
	
	include('footer.php');
       
?>