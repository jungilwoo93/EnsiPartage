<?php include('header.php') ?>
<section class="contenu">
<div class="container">
	<div id="calendar_s">
		<?php echo "
				<div class=\"panel panel-default\" id=\"event\" style=\"width:100%\">
					<div class=\"panel-heading\">
						<h3>Aujourd'hui </h3>" . date("Y/m/d") . "<br>
					</div>"
				
		?>
		
			<div class="panel-body">
				
					<nav>
						<span>
							<button id="lastYear">◀</button>
							<label id="year"></label>
							<button id="nextYear">▶</button>
						</span>
						<span>
							<button id="lastMonth">◁</button>
							<label id="month"></label>
							<button id="nextMonth">▷</button>
						</span>
						<button id="backToday">Aujourd'hui</button>
					</nav>

					<div class="large70" id="calendar" style="width:70%">
						<table id="dateZone">
							<thead>
								<tr>
									<td>Dim</td>
									<td>Lun</td>
									<td>Mar</td>
									<td>Mer</td>
									<td>Jeu</td>
									<td>Ven</td>
									<td>Sam</td>
								</tr>
							</thead>
							<tbody id="dateTable">
							</tbody>
						</table>

					</div>
					<div id="todayInfo">
						<form  method="post">
							<div id="dateInfo"></div>
							<div id="weekInfo"></div>
						</form>
						<div class="eventInfo">
							
						<script src="js/calendrier.js"></script>
						
						<?php
							$info=$_GET['info'];
							$dateInfo=date("Y-d-m",strtotime($info));
							$_SESSION['dateInfo']=$dateInfo;
							$id=$_SESSION['id'];
							$reponse2=$bdd->query("SELECT count(titre) FROM evenement INNER JOIN participe ON evenement.id=participe.evtid WHERE participe.userid='$id'");
							while($data2=$reponse2->fetch()){
								$nb=$data2[0];
							}
							
							$reponse=$bdd->query("SELECT titre,timeDebut FROM evenement INNER JOIN participe ON evenement.id=participe.evtid WHERE participe.userid='$id' AND evenement.dateDebut='$dateInfo' GROUP BY titre");
							while($data = $reponse->fetch()){
								$titre=$data[0];
								$timeDebut=$data[1];
								echo '<div>'.$titre.' à '.$timeDebut.'</div>';
								//essayer mettre id et numeroter event
							}
							
						?>
						
						</div>
						<form method="post" action="traitement-event.php">
							<input type="submit" value="Créer" name="creer"/>
							<input type="submit" value="Supprimer" name="supprimer"/>
						</form>
						
					</div>
				
			
			</div>
		</div>
		<script src="js/jquery-3.2.1.js"></script>
	</div>
</div>	

</section>
<?php include('footer.php') ?>
