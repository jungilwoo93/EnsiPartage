<?php
	include('headerConnexion.php');
?>		
	<div class="row"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		</div>
	<div class="row"> 
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<form class="form-signin" method="post" action="traitement-inscription.php">
						<div class="form_group">					   
							<label for="genre">Civilité : </label>
						   <select name="genre" class="form-control input-sm" id="genre" required >
								<option value="">-</option>
								<option value="M">Homme</option>
								<option value="F">Femme</option>
						   </select><br />
						</div>
						<div class="form_group">
							<input type="text" id="inputnom" class="form-control input-sm" name="nom" placeholder="Votre nom" required /><br />
						</div>
						<div class="form_group">
							<input type="text" id="inputprenom" class="form-control input-sm" name="prenom" placeholder="Votre prenom" required /><br />
						</div>
						<div class="form_group">
							<input type="email" id="inputmail" class="form-control input-sm" name="mail" placeholder="Votre mail" required/><br />
						</div>
						<div class="form_group">
							<input type="password" id="inputpassword" class="form-control input-sm" name="mdp" placeholder="mot de passe" size="8" required />
						</div>
						<div class="form_group">
							<input type="password" class="form-control input-sm" name="mdpConfirm" placeholder="confirmer votre mot de passe" required />
						</div>
						<div class="form_group">
							<label for="dateNaissance">Date de naissance : </label>
							<input type="date" id="dateNaissance" class="form-control input-sm" name="dateNaissance" required size="15">
						</div>
						<div class="form_group">
						<label for="statut">Précisez votre statut : </label>
							<select name="statut" class="form-control input-sm" id="statut" required>
								<option value="">-</option>
								<option value="etudiant">Etudiant</option>
								<option value="enseignant">Enseignant</option>
								<option value="ancien">Ancien</option>
								<option value="personnel">Personnel</option>
								<option value="externe">Externe</option>
							</select><br />
						</div>
						<div class="form_group">
							<input type="text" class="form-control input-sm" name="adresse" placeholder="Votre adresse postale" required/><br />
						</div>
                        <div class="form_group">
							<div class="panel panel-default" style="opacity: 0.7;">
								<div class="panel-heading">
									<p style="text-align:center;">Afin de vérifier la force de votre mot de passe, nous vous invitons à utiliser la ressources fournie par l'UHA:</p>
									<p style="text-align:center;"> <a href="https://www.e-services.uha.fr/mdp/" target="_blank">UHA Password Metter</a> </p>
								</div>
							</div>
						</div>
						<div class="form_group">
							<button class="btn btn-lg btn-primary btn-block" type="submit">S'inscrire</button>
						</div>
					</form>
            
        </div>
	</div>
</div>
<?php
	include('footer.php');
?>