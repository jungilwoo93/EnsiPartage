<?php
	include('header.php');

?>
	<div class="container-fluid">
		<div id="general" class="row" style="padding-top:15vh;"> 
			<div id="gauche" class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >	
				<p>
					<?php 
						//echo "<p>";
						$rep = $bdd->prepare('SELECT groupe.nom, groupe.id FROM groupe INNER JOIN appartenance ON groupe.id = appartenance.groupId INNER JOIN utilisateur ON utilisateur.id = appartenance.userId WHERE userId="'.$_SESSION['id'].'"');
						$rep->execute(); 
				
						echo "<ul id=\"menu\" style=\"list-style:none;text-align:center;\">";
						echo "<li><p><a class=\"lien\" href=\"groupes_amis.php\" style=\"text-decoration:none;display:block;width:20vh;height:30px;padding-top:5px;background-color:#483D8B;color:black;margin-bottom:3vh;\">GROUPES</a></p></li>";
						//echo "<ul>";
						while($donnees = $rep->fetch()){
							echo '<li><p>';
							echo '<a class="lien" style="text-align:center;text-decoration:none;display:block;width:20vh;background-color:#5050D0;color:white;" href="messagerie.php?groupid='.Securite::html($donnees['id']).'"> '.Securite::html($donnees['nom']).'</a>';
							echo '</p></li>';
						}
						echo "</ul>";
					?>
			</div>
			<div id="droite" class="col-xs-10 col-sm-10 col-md-10 col-lg-10" style="padding:1%;">
				<p>Connecté en tant que
					<?php
						echo '<strong>'.strtoupper($_SESSION['nom']).'</strong>';
					?>
				</p>
				<div id="tchat" style="margin-bottom:0;">
					<?php
						$res = $bdd->query('SELECT COUNT(*) as nb FROM message');
						$data = $res->fetch();
						$nbr = $data['nb'];
						$minus = 11;
						$offset = $nbr - $minus;
						$req = $bdd->prepare("SELECT * FROM message INNER JOIN discussion ON message.id = discussion.messageId WHERE groupId=:groupid");
						$req->execute(array('groupid'=>Securite::secure($_GET['groupid']))); 
						while($data = $req->fetch()) {
							$message =$data['contenu'];
							$message = str_replace(Securite::html('\r\n'), '<br>',$message);
							if(pair($data['id'])){
								echo "<p style=\"background-color:#D3D3D3;display:inline-block;\">".strtoupper($data['usernom'])." : ";
								echo  "".$message."</p><br />";
							}else {
								echo "<p style=\"display:inline-block;background-color:#D2B487;\">".strtoupper($data['usernom'])." : ";
								echo  "".$message."</p><br />";
							}
							
						}
					?>

				</div><br />
				<div id="in">
					<form method="post" action="traitement-message.php">
                    	<p>
                            <input type="hidden" name="groupid" value=<?php echo Securite::html($_GET['groupid']); ?>/>
                        </p>
							<textarea id="area" name="message" class="form-control" placeholder="Taper votre message ici" style="width=30vh;height:25vh;" required autofocus></textarea><br />
							<p style="text-align:right"><button class="btn btn-primary" type="submit">Envoyer</button></p> 
					</form>
					
				</div>
			</div>
		</div>
	</div>
	<script src="jquery/jquery-3.2.1.js"></script>
	<script>
		setInterval(function(){
			$("#tchat").load('load-message.php?groupid=.<?php echo Securite::html($_GET['groupid']); ?>'); 
		}, 3000);
	</script>
<?php
	include('footer.php');
?>
