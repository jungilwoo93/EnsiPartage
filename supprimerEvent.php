<?php include('header.php') ?>
<section class="contenu">
	<div class="divCentre">
		<div class="checkbox">
			<form method="post" action="traitement-event.php">
			<?php 
				$dateInfo=$_SESSION['dateInfo'];
				$id=$_SESSION['id'];
				$reponse=$bdd->query("SELECT titre,dateDebut,timeDebut FROM evenement INNER JOIN participe ON evenement.id=participe.evtid WHERE participe.userid='$id' AND evenement.dateDebut='$dateInfo' GROUP BY titre");
				while($data = $reponse->fetch()){
					$titre=$data[0];
					$dateDebut=$data[1];
					$timeDebut=$data[2];
					echo '<div><div class="champs"><input type="checkbox" value="'.$titre.'" name="event[]" /></div><div class="divTitre">'.$titre.'</div><div class="divDate">'.$dateDebut.'</div><div class="divTime">'.$timeDebut.'</div></div>';
				}


			?>
			<input type="submit" name="delete" value="Supprimer"/>
			</form>
		</div>
	</div>
	<script src="calendrier.js"></script>
	<script src="jquery-3.2.1.js"></script>
	
</section>
<?php include('footer.php') ?>