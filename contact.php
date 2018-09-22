<?php
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
if (!empty($_SESSION['etatConnexion']) and $_SESSION['etatConnexion']=='true') { 
	include('header.php');
}else{
	session_destroy();
	include('headerConnexion.php');
}
?>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
				<section class="contenu" id="contact">
				
				
					<div class="panel panel-default">
							<div class="panel-heading">
								<h2>Contact</h2>
							</div>
					</div>
					<div class="panel panel-default">
							<div class="panel-body">
								<form method="post" action="traitement.php">
									<div class="form-group">
									<p>
										<label for="nom">Nom:</label>
										<input type="text" name="nom" placeholder="Votre nom" id="nom"/>
									</p>
									</div>
									<div class="form-group">
									<p>
										<label for="prenom">Prénom:</label>
										<input type="text" name="prenom" placeholder="Votre pr&eacute;nom" id="prenom"/>
									</p>
									</div>
									<div class="form-group">
									<p>
										<label for="mail">Mail:</label>
										<input type="email" name="mail" placeholder="Votre mail" id="mail"/>
									</p>
									</div>
									<p><label for="statut">Votre Statut:</label>
										<select name="statut" class="selectpicker" id="statut">
											<optgroup label="Etudiant">
													<option value="ir">Informatique et Réseaux</option>
													<option value="as">Automatique et Systèmes Embarqués</option>
													<option value="meca">Mécanique</option>
													<option value="textile">Textile</option>
											</optgroup>
											<optgroup label="Ancien">
													<option value="ancien-IR">Ancien Informatique et Réseaux</option>
													<option value="ancien-AS">Ancien Automatique et Systèmes Embarqués</option>
													<option value="ancien-M">Ancien Mécanique</option>
													<option value="ancien-T">Ancien Textile</option>
											</optgroup>
											<option value="enseignant">Enseignant</option>
											<option value="externe">Externe</option>
											<option value="personnel">Personnel</option>
										</select>
									</p>
									<div class="form-group">
									<p>
									
										<label for="objet">Objet de la requête:</label>
										<input type="text" name="objet" placeholder="Quel est l'objet de votre requ&ecirc;te?" id="objet"/>
									</p>
									</div>
									<div class="form-group">
									<p>
										<label for="message">Décrivez-nous votre requête:</label>
									</p>
									<p>
										<textarea name="message" cols="80" rows="15" id="message"> </textarea>
									</p>
									
									</div>
									<p>
										<button type="submit" class="btn btn-default" name="envoi">Envoyer</button>
										<button type="reset" class="btn btn-default" value="Vider le formulaire">Vider le formulaire</button>
										
									</p>
								</form>
							</div>
					</div>
				</section>
			</div>
		</div>
	</div>

<?php
	include('footer.php');
?>