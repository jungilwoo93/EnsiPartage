<?php
	include ('header.php');
?>
<section class="contenu">
<section id="editProfil">

		<div class="main_page">
			<div class="profil_donnees">
				<div class="profil">
					<img src="<?php echo $_SESSION['avatar']; ?>" height="300" width="300" alt="" style="border:1px groove black;"/>
					<?php 
						echo '<p style="width:20%;text-align: center;margin-left: 40%;background-color: aliceblue;">'.Securite::html($_SESSION['nom']).' '.Securite::html($_SESSION['prenom']).'</p>';
					?>
				</div>
				<div class="donnees">
					<div class="donnesList">
					
						<div class="panel panel-default">
							<div class="Title">
								<div class="panel-heading" style="text-align:center; font-size:30px;">Informations Personnelles</div>
								
							</div>
							<hr>
						</div>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="info">
								
									<form method="post" action="traitement-profil.php?formulaire=profil" name="editProfil" enctype="multipart/form-data">
									 <ul>
										<li>
											<label class="info_left">Genre : </label>
											<label class="info_right">
										   <p><select name="genre" required>
											   <option value="M">Homme</option>
											   <option value="F">Femme</option>
										   </select></p>
										</li>
										<li>
											<label class="info_left">Date Naissance : </label>
											<label class="info_right">
												<?php 
													$dateNaissance = Securite::html($_SESSION['dateNaissance']); 
													echo $dateNaissance; 
												?></label>
												<input type="date" name="dateNaissance" />
										</li>
										<li>
											<label class="info_left">Nom : </label>
											<label class="info_right">
												<?php 
													$nom = Securite::html($_SESSION['nom']); 
													echo $nom;
												?></label>
												<input type="text" name="nom" placeholder="Votre nom"/>
										</li>
										<li>
											<label class="info_left">Prénom : </label>
											<label class="info_right">
												<?php 
													$prenom = Securite::html($_SESSION['prenom']); 
													echo $prenom;
												?></label>
												<input type="text" name="prenom" placeholder="Votre prenom"/>
										</li>
										
										<li>
											<label class="info_left">Mail : </label>
											<label class="info_right">
												<?php 
													$mail = Securite::html($_SESSION['mail']); 
													echo $mail;
												?></label>
										</li>
										<li>
											<label class="info_left">Statut : </label>
											<label class="info_right">
												<?php 
													$statut = Securite::html($_SESSION['statut']); 
													echo $statut;
												?></label>
												
										</li>
										<li>
											<label class="info_left">Adresse : </label>
											<label class="info_right">
												<?php 
													$adresse = Securite::html($_SESSION['adresse']); 
													echo $adresse;
												?></label>
												<input type="text" name="adresse" placeholder="Votre adresse"/>
										</li>	
										<li>
											<label class="info_left">Charger un avatar(jpg, png, gif) : </label>
											<label class="info_right"></label>
											<input type="file" name="avatar"/>
										</li>
									   <input type="hidden" name="MAX_FILE_SIZE" value="5048576 " />
									
									 </ul>
									<p><input type="submit" value="Editer" /></p>
						
									</form>
								</div>
							</div>
							<div class="donnesList">
								
							</div>
						</div>
					</div>
				</div>
		</div>
	

</section>
<?php
	include('footer.php');
?>