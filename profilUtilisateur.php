<?php
 
	include('header.php');

?>
   <section class="contenu">
    <section id="contenu_profilUser">
		<div class="main_page">
			<div class="profil_donnees">
				<div class="profil">
					<img src="<?php echo $_SESSION['avatar']; ?>" height="20%" width="20%" style="border:1px groove black;"/>
					<?php 
						echo '<p style="width: 20%;text-align: center;margin-left: 40%;background-color: aliceblue;">'.Securite::html($_SESSION['nom']).' '.Securite::html($_SESSION['prenom']).'</p>';
					?>
				</div>
				<div class="donnees">
					<div class="donnesList">
						<div class="Title">
							<div class="panel panel-default">
									
										<div class="panel-heading" style="text-align:center; font-size:30px;">Informations Personnelles</div>
							</div>
							<hr>
						</div>
						<div class="info" >
							<div class="panel panel-default">
							<div class="panel-body">
							<span><a href="editProfil.php">Edit</a></span>
							<ul>
								<li>
									<label class="info_left">Genre : </label>
									<label class="info_right">
										<?php 
                                            $genre = Securite::html($_SESSION['genre']); 
											if($_SESSION['genre'] == 'M'){
												echo "Homme";
											}else{
												echo "Femme";
											}
										?></label>
								</li>
								<?php if($_SESSION['prefDate']){ ?>
                                <li>
									<label class="info_left">Date de Naissance : </label>
									<label class="info_right">
										<?php 
                                            $dateNaissance = Securite::html($_SESSION['dateNaissance']);
											echo $dateNaissance;
										?></label>
								</li>
                                <?php } ?>
								<li>
									<label class="info_left">Nom : </label>
									<label class="info_right">
										<?php 
								            $nom = Securite::html($_SESSION['nom']);
											echo $nom;
										?></label>
								</li>
								<li>
									<label class="info_left">Prénom : </label>
									<label class="info_right">
										<?php 
								            $prenom = Securite::html($_SESSION['prenom']);
											echo $prenom;
										?></label>
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
                                <?php if($_SESSION['prefAdresse']){ ?>
								<li>
									<label class="info_left">Adresse : </label>
									<label class="info_right">
										<?php 
								            $adresse = Securite::html($_SESSION['adresse']);
											echo $adresse;
										?></label>
								</li>
								<?php } ?>
								
							 </ul>
							</div>
							</div>
						</div>
					</div>
						<div class="donnesList">
						<div class="Title">
							<div class="panel panel-default">
									
										<div class="panel-heading" style="text-align:center; font-size:30px;">Préférence d'affichage</div>
							</div>
							<hr>
						</div>
                        <div class="info" >
							<div class="panel panel-default">
							<div class="panel-body">
                            <form method="post" action="traitement-profil.php?formulaire=preference" name="editPreference" enctype="multipart/form-data">
                                Afficher l'adresse: <input type="checkbox" name="prefAdresse" <?php if($_SESSION['prefAdresse']==1){echo 'checked="checked"';} ?> /> <br />
                                Afficher la date de naissance: <input type="checkbox" name="prefDate" <?php if($_SESSION['prefDate']==1){echo 'checked="checked"';} ?>/> <br />
                                Afficher l'image de fond: <input type="checkbox" name="prefBackground" <?php if($_SESSION['prefBackground']==1){echo 'checked="checked"';} ?>/><br />
                                <li>
									Charger un fond (jpg, png, gif) :
									<label class="info_right">

										<input type="file" name="background"/>
								</li>
                               <input type="hidden" name="MAX_FILE_SIZE" value="5048576 " />
                                <input type="submit" value="Valider"/>
                            </form>	
                            </div>
                           </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    </section>
<?php
	include('footer.php');
?>