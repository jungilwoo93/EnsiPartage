<?php
    include('header.php');
	if(isset($_POST['creer'])){ 
		header("Location:creerEvent.php");
	}
	
	if(isset($_POST['annulation'])){ 
		header("Location:calendrier.php");
	}
	
	if(isset($_POST['supprimer'])){
		//afficher une liste d'events, et choisir ce que on veut supprimer?
		header("Location:supprimerEvent.php");
	}
	
	if(isset($_POST['creation'])){ 
		 if(!empty($_POST['titre'])){ 
            $titre = $_POST['titre']; 
            if(!empty($_POST['lieu'])){ 
                $lieu = $_POST['lieu']; 
                if(!empty($_POST['dateDebut'])){ 
                    $dateDebut = $_POST['dateDebut'];
					if(!empty($_POST['timeDebut'])){
						$timeDebut=$_POST['timeDebut'];
						if(!empty($_POST['dateFin'])){ 
							$dateFin = $_POST['dateFin'];
							if(!empty($_POST['timeFin'])){
								$timeFin= $_POST['timeFin'];
								if(!empty($_POST['description'])){ 
									$description = $_POST['description']; 							
								$insertion = $bdd->prepare('INSERT INTO evenement VALUES(NULL,"'.$titre.'","'.$lieu.'","'.$dateDebut.'","'.$timeDebut.'","'.$dateFin.'","'.$timeFin.'","'.$description.'")'); // préparation de la requête d'insertion dans la base de données
								$insertion->execute(); // exécution de l'insertion	
							}	
						}
					}
				}
			}
		}
		 }
		$reponse=$bdd->query("SELECT id,lieu FROM evenement where titre='$titre' AND dateDebut='$dateDebut' AND dateFin='$dateFin' AND description='$description' AND lieu='$lieu'");
		while($data = $reponse->fetch()){
			//select where titre pour avoir id
			$idEvt=$data[0];
			$insert = $bdd->prepare('INSERT INTO participe VALUES(NULL,'.$_SESSION['id'].','.$idEvt.')');
			$insert->execute();
		}
		header("Location:calendrier.php");
	}
	
	if(isset($_POST['delete'])){
		if(!empty($_POST['event'])){
			$array=$_POST['event'];
			$size=count($array);
			for($i=0;$i<$size;$i++){
				$supprimer=$bdd->prepare("DELETE FROM evenement WHERE titre='$array[$i]'");
				$supprimer->execute();
			}
			header("Location:calendrier.php");
		}
	}
	
	
	include('footer.php');
?>