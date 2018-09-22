<?php
 
	include('header.php');

	$recherche = $_POST['recherche'];
	$motrecherche= explode(" ",$recherche);
	$tableid=array();
	foreach ($motrecherche as $mot){
		$mot=Securite::html($mot);
		$recuperer = $bdd->prepare('SELECT * FROM utilisateur WHERE mail=:mot OR nom=:mot OR prenom=:mot');
		$recuperer->execute(array('mot'=>$mot));
		$dataint = $recuperer->fetch();
		$tableid[]=$dataint['Id'];
	}
	
	$finalid=max($tableid);
	$selection = $bdd->prepare('SELECT * FROM utilisateur WHERE id=:id');
	$selection->execute(array('id'=>$finalid));
	$data = $selection->fetch();
	

	
	$genre=Securite::html($data['Genre']); 
	$adresse=Securite::html($data['adresse']);
	$dateNaissance=Securite::html($data['DateNaissance']);
	$nom=Securite::html($data['nom']);
	$prenom=Securite::html($data['prenom']);
	$mail=Securite::html($data['mail']);
	$statut=Securite::html($data['statut']);
	$avatar=$data['Avatar'];	
	$prefAdresse=$data['prefAffichAdresse'];
	$prefDate=$data['prefAffichDateNaissance'];

?>
   <section class="contenu">
    <section id="contenu_profilUser">
		<div class="main_page">
			<div class="profil_donnees">
				<div class="profil">
					<img src="<?php echo $avatar; ?>" height="20%" width="20%" style="border:1px groove black;">
					<?php 
						echo '<p style="width: 20%;text-align: center;margin-left: 40%;background-color: aliceblue;">'.$nom.' '.$prenom.'</p>';
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
							<ul>
								<li>
									<label class="info_left">Genre : </label>
									<label class="info_right">
										<?php 
                                            echo $genre;
										?></label>
								</li>
								<?php if($prefDate){ ?>
                                <li>
									<label class="info_left">Date de Naissance : </label>
									<label class="info_right">
										<?php 
											echo $dateNaissance;
										?></label>
								</li>
                                <?php } ?>
								<li>
									<label class="info_left">Nom : </label>
									<label class="info_right">
										<?php 
											echo $nom;
										?></label>
								</li>
								<li>
									<label class="info_left">Prénom : </label>
									<label class="info_right">
										<?php 
											echo $prenom;
										?></label>
								</li>
								
								<li>
									<label class="info_left">Mail : </label>
									<label class="info_right">
										<?php 
											echo $mail;
										?></label>
								</li>
								<li>
									<label class="info_left">Statut : </label>
									<label class="info_right">
										<?php 
											echo $statut;
										?></label>
								</li>
                                <?php if($prefAdresse){ ?>
								<li>
									<label class="info_left">Adresse : </label>
									<label class="info_right">
										<?php 
											echo $adresse;
										?></label>
								</li>
								<?php } ?>
								
							 </ul>
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