<div class="menu">
	
   	 <?php 
        if (session_status() != PHP_SESSION_NONE) { 
		?>
		<div class="menu">
					<div id="listMenu">
						<div class="row" style="background-color:aliceblue;">
							<div class="col-xs-12 col-sm-3 col-md-2"><div class="logo"><a href="accueil.php"><img src="image/logo.png" alt="EnsiPartage"></a></div></div>
							<div class="col-xs-12 col-sm-6 col-md-7" style="padding-top: 2.5%;text-align: center;">
								<div class="col-xs-12 col-sm-4 col-md-2"><a class="btn btn-default" role="button" href="accueil.php"> Accueil </a></div>
								<div class="col-xs-12 col-sm-4 col-md-3"><a class="btn btn-default" role="button" href="messagerie.php?groupid=0"> Messagerie </a></div>
								<div class="col-xs-12 col-sm-4 col-md-2"><a class="btn btn-default" role="button" href="service.php"> Service </a></div>
								<div class="col-xs-12 col-sm-4 col-md-2"><a class="btn btn-default" role="button" href="profilUtilisateur.php"> Profil </a></div>
								<div class="col-xs-12 col-sm-4 col-md-2"> 
									<form action="VisitUtilisateur.php" method="post">
										<input type="search" placeholder="Rechercher.." name="recherche">
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3">
								<div class="col-xs-12 col-sm-4 col-md-6">
									<div class="profilIcon" style="text-align:center;">
												<a href="profilUtilisateur.php"><img src="<?php echo $_SESSION['avatar']; ?>" alt="profil" class="center-block" style="width:20%;height:20%;padding-top:4vh" /></a>
												<p><?php echo Securite::html($_SESSION['nom'])." ".Securite::html($_SESSION['prenom']); ?></p>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6">
									<div class="disconect">
											<a href="valide_dec.php"><img src="image/deconnexion.png" alt="déconnexion" class="center-block" style="width: 5vh; padding-top: 5vh;"/></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
    <?php } 
		else{
		?>
		<div class="row" style="background-color:aliceblue;">
			<div id="connexion-menu">
				<div class="col-xs-12 col-sm-3 col-md-2"><div class="logo"><a href="accueil.php"><img src="image/logo.png" alt="EnsiPartage"></a></div></div>
				<div class="col-xs-12 col-sm-9 col-md-10" style="padding-right: 18.5%;">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h2>
								Bienvenue sur EnsiPartage
							</h2>
						</div>
					</div>
					<div class="row" style="font-weight: bold;text-align:center;">
						<div class="col-xs-12 col-sm-6 col-md-6"><a href="inscription.php"> inscription </a></div>
						<div class="col-xs-12 col-sm-6 col-md-6"><a href="contact.php"> contact </a></div>
					</div>
				</div>
			</div>
		</div>
	
        <?php } ?>
	
</div>
