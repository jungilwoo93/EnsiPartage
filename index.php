<?php
	include('headerConnexion.php');
?>
       <div class="container" style="margin-top: 10vw;padding-top: 2vw;background-color:#DDD;padding-bottom: 2vw;margin-bottom: 3vw; width:30%;">
		   <div class="row">
				<div class="clo-xs-12 col-sm-12 col-md-12">
				  <form class="form-signin" method="post" action="traitement-connexion.php">
					<input type="email" name="mail" id="inputEmail" class="form-control" placeholder="email" size="100" required autofocus><br />
					<input type="password" name="mdp" id="inputPassword" class="form-control" placeholder="mot de passe" size="100" required><br />
					<button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button><br />
				  </form>
				</div>
			</div>
			<div class="row" style="text-align:center; font-size:140%; ">
				<a href="inscription.php"> inscription </a>
			</div>
		</div>
<?php
	include('footer.php');
?>
