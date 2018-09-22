<?php
	session_start();
    include('headerConnexion.php');
	
	$formulaire = $_GET['formulaire'];
	$nomgroup=Securite::secure($_POST['nom']);

	switch ($formulaire) {
	case "creation" :
		$creation = $bdd->prepare('INSERT INTO groupe VALUES(NULL,:nomgroup,0,"0.0.0")');
		$creation->execute(array('nomgroup'=>$nomgroup));
	
		$getgroupid = $bdd->prepare('SELECT id FROM groupe WHERE nom="'.$nomgroup.'"');
		$getgroupid->execute();
		$data = $getgroupid->fetch();
		$groupid = Securite::html($data['id']);
		
		$liaison = $bdd->prepare('INSERT INTO appartenance VALUES(NULL,:userid,:groupid)'); 
		$liaison->execute(array('userid'=> $_SESSION['id'],'groupid'=> $groupid));
	break;
	 
	case "supression" :
		$getgroupid = $bdd->prepare('SELECT id FROM groupe WHERE nom="'.$nomgroup.'"');
		$getgroupid->execute();
		$data = $getgroupid->fetch();
		$groupid = Securite::html($data['id']);
		
		$primarygroup = array("Utilisateur", "Administrateur", "Moderateur", "Etudiant", "Ancien", "Professeur", "Personnel", "Externe");
		if (!in_array($nomgroup, $primarygroup)) {	
			$suppression = $bdd->prepare('DELETE FROM groupe WHERE groupe.id=:groupid');
			$suppression->execute(array('groupid'=>$groupid));
		}
	break;
	 
	case "rejoindre" :
		$getgroupid = $bdd->prepare('SELECT id FROM groupe WHERE nom="'.$nomgroup.'"');
		$getgroupid->execute();
		$data = $getgroupid->fetch();
		$groupid = Securite::html($data['id']);
		
		$rejoindre = $bdd->prepare('INSERT INTO appartenance VALUES(NULL,:userid,:groupid)'); 
		$rejoindre->execute(array('userid'=> $_SESSION['id'],'groupid'=> $groupid));
	break;
	
	case "quitter" :
		$getgroupid = $bdd->prepare('SELECT id FROM groupe WHERE nom="'.$nomgroup.'"');
		$getgroupid->execute();
		$data = $getgroupid->fetch();
		$groupid = Securite::html($data['id']);
		
		$sortir = $bdd->prepare('DELETE FROM appartenance WHERE groupId=:groupid'); 
		$sortir->execute(array('groupid'=> $groupid));
	break;
	}
	
	header('location:groupes_amis.php');
	include('footer.php');
?>