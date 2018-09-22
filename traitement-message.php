<?php
	include('header.php');
	

	if(!empty($_POST['message'])){
		$groupid=Securite::secure(str_replace('/', '',$_POST['groupid']));
		$message = Securite::secure($_POST['message']);
		$req = $bdd->prepare("INSERT INTO message(usernom,date,contenu) VALUES(:usernom,NOW(),:contenu)");
		$req->execute(array("usernom"=>$_SESSION['nom'],"contenu"=>$message));
		

		$messageid = $bdd->lastInsertId();
		echo $messageid."salut".$groupid;
		$discussion = $bdd->prepare("INSERT INTO discussion (ID, groupId, messageId) VALUES (NULL, :groupid, :messageid)");
		$discussion->execute(array("groupid"=>$groupid,"messageid"=>$messageid));
		

		header('Location: messagerie.php?groupid='.$groupid);
	}else {
		
		echo "<script type=\"text/javascript\">
				alert('Veuillez renseigner le champs message');
			</script>";
			
			header('Location: messagerie.php?groupid=0');
	}
	
?>