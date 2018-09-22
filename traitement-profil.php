<?php
	session_start();
    include('headerConnexion.php');
	$mail=Securite::secure($_SESSION['mail']);
	
	$formulaire = $_GET['formulaire'];
	switch ($formulaire) {
	case "profil" :
		if(!empty($_POST['genre'])){
			$_SESSION['genre'] = $_POST['genre'];
		}
		if(!empty($_POST['dateNaissance'])){
			$_SESSION['dateNaissance'] = $_POST['dateNaissance'];
		}
		if(!empty($_POST['nom'])){
			$_SESSION['nom'] = $_POST['nom'];
		}
		if(!empty($_POST['prenom'])){
			$_SESSION['prenom'] = $_POST['prenom'];
		}
		if(!empty($_POST['adresse'])){
			$_SESSION['adresse'] = $_POST['adresse'];
		}
		
		if(!empty($_FILES['avatar'])){
	
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	
			$extension_upload = strtolower(  substr(  strrchr($_FILES['avatar']['name'], '.')  ,1)  );
			if ( in_array($extension_upload,$extensions_valides) ) {
				$path = "userAvatar/avatar.{$_SESSION['id']}";
				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$path);
	
				if ($resultat) {
					$_SESSION['avatar']=$path;
				}
			}
		}
	
		
			$genre=Securite::secure($_SESSION['genre']);
			$dateNaissance=Securite::secure($_SESSION['dateNaissance']);
			$nom=Securite::secure($_SESSION['nom']);
			$prenom=Securite::secure($_SESSION['prenom']);
			$adresse=Securite::secure($_SESSION['adresse']);
			$avatar=$_SESSION['avatar'];
			
			echo $avatar;
	
		$edition = $bdd->prepare('UPDATE utilisateur SET Genre = "'.$genre.'", DateNaissance = "'.$dateNaissance.'", nom = "'.$nom.'", prenom = "'.$prenom.'", adresse = "'.$adresse.'", Avatar = "'.$avatar.'" WHERE mail="'.$mail.'"');
		$edition->execute();
	break;
	
	case "preference":

		if(!empty($_POST['prefAdresse']) and $_POST['prefAdresse']=='on'){
			$_SESSION['prefAdresse']=1;
		}else{
			$_SESSION['prefAdresse']=0;
		}
		if(!empty($_POST['prefDate']) and $_POST['prefDate']=='on'){
			$_SESSION['prefDate']=1;
		}else{
			$_SESSION['prefDate']=0;
		}
		if(!empty($_POST['prefBackground']) and $_POST['prefBackground']=='on'){
			$_SESSION['prefBackground']=1;
		}
		else{
			$_SESSION['prefBackground']=0;
		}
		if(!empty($_FILES['background'])){
			$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
			$extension_upload = strtolower(  substr(  strrchr($_FILES['background']['name'], '.')  ,1)  );
			if ( in_array($extension_upload,$extensions_valides) ) {
				$path = "userBackground/Background.{$_SESSION['id']}";
				$resultat = move_uploaded_file($_FILES['background']['tmp_name'],$path);
	
				if ($resultat) {
					$_SESSION['background']=$path;
					$background=$path;
				}
			}
		}
	
		
		$prefadresse=$_SESSION['prefAdresse'];
		$prefdate = $_SESSION['prefDate'];
		$prefbackground=$_SESSION['prefBackground'];
		$userid = $_SESSION['id'];
		
		
		$editionpref = $bdd->prepare('UPDATE utilisateur SET prefAffichAdresse=:prefadresse, prefAffichDateNaissance=:prefdate WHERE mail="'.$mail.'"');
		$editionpref->execute(array('prefadresse'=>$prefadresse,'prefdate'=>$prefdate));
		
		$editionpref2 = $bdd->prepare('UPDATE annexeutilisateur SET prefAffichBackground=:prefbackground, background=:background WHERE userid=:userid');
		$editionpref2->execute(array('prefbackground'=>$prefbackground,'background'=>$background,'userid'=>$userid));
	break;
	}
	header('location:profilUtilisateur.php');
	include('footer.php');
?>