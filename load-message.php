<?php
	include('fonction.php');
	session_start();
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=ensipartage;charset=utf8','root','');
	}
	catch(Exception $e){
		die('Erreur : '.$e->getMessage());
	}

	echo "</p><div id=\"tchat\">";
	$res = $bdd->query('SELECT COUNT(*) as nb FROM message');
	$data = $res->fetch();
	$nbr = $data['nb'];
	$minus = 11;
	$offset = $nbr - $minus;
	$req = $bdd->prepare("SELECT * FROM message INNER JOIN discussion ON message.id = discussion.messageId WHERE groupId=:groupid");
	$req->execute(array('groupid'=>Securite::secure($_SESSION['groupid']))); 
	while($data = $req->fetch()) {
		$message =$data['contenu'];
		$message = analyseur($message);
		if(pair($data['id'])){
			echo "<p style=\"background-color:#D3D3D3;display:inline-block;\">".strtoupper($data['usernom'])." : ";
			echo  "".$message."</p><br />";
		}else {
			echo "<p style=\"display:inline-block;background-color:#D2B487;\">".strtoupper($data['usernom'])." : ";
			echo  "".$message."</p><br />";
		}
					  
	}
	
	echo '</div>';
	header('location:message.php?groupid='.Securite::html($_GET['groupid'])."'");
	
	?>