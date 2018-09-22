<?php include('header.php') ?>
<section class="contenu">
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="divCentre">
				<h2>Créer un évenement</h2>
			</div>
		</div>
			<div class="panel-body">
				<form method="post" action="traitement-event.php">
					<div class="form-group">
						<label for="titre">Titre de l’évènement : </label>
						<input type="text" class="form-control" id="titre" name="titre" placeholder="Ajoutez un titre court pour votre event"/>
					</div>
					<p>
						<label for="lieu">Lieu : </label>
						<input type="text" name="lieu" id="lieu" placeholder="Ajoutez un lieu ou une adresse" />
					</p>
					<p>
						<label for="dateDebut">Heure début : </label>
						<input type="date" id="dateDebut" name="dateDebut" />
						<input type="time" name="timeDebut" />
					</p>
					<p>
						<label for="dateFin">Heure fin : </label>
						<input type="date" id="dateFin" name="dateFin"/>
						<input type="time" name="timeFin" />
					</p>
					<p><label for="description">Description : </label> 
						<textarea name="description" id="description" cols="80" rows="15"></textarea>
					<p>
						<input type="submit" value="Créer" name="creation"/>
						<input type="submit" value="Annuler" name="annulation"/>	
					</p>
				</form>
			</div>
	</div>

</div>
</section>
<?php include('footer.php') ?>
