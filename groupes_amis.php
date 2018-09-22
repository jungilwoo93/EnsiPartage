<?php
	include('header.php');
?>
<section class="contenu">
<section class="contenu_accueil">
	<div class="main_page">
		<div class="lien_externe">
			<div class="panel panel-default">
            	<div class="event_msg">

					<div class="panel-heading">
						<h3>Gestion des groupes</h3>
					</div>
					<div class="panel-body">
                          <div class="panel panel-default" id="event">
							<div class="panel-heading">
								<h3>Vos groupes</h3>
							</div>
							<div class="panel-body">
								<?php 
                                    $rep = $bdd->prepare('SELECT groupe.nom,groupe.id FROM groupe INNER JOIN appartenance ON groupe.id = appartenance.groupId INNER JOIN utilisateur ON utilisateur.id = appartenance.userId WHERE userId="'.$_SESSION['id'].'"');
                                    $rep->execute(); 
                                    while($donnees = $rep->fetch()){
                                        echo '<p>';
                                        echo '<a href="messagerie.php?groupid='.Securite::html($donnees['id']).'">* '.Securite::html($donnees['nom']).'</a>';
                                        echo '</p>';
                                    }
                                ?>
							</div>
						</div>
						<div class="panel panel-default" id="meg">
							<div class="panel-heading">
								<h3>Gestion des groupes</h3>
							</div>
							<div class="panel-body">
                            	<p><h4>Creer un groupe:</h4></p>
								<form action="traitement-groupe.php?formulaire=creation" method="post">
                                     <p>Nom du groupe : <input type="text" name="nom" /></p>
                                     <p><input type="submit" value="Creer"></p>
                                </form>
                                <hr>
								<p><h4>Supprimer un groupe:</h4></p>
								<form action="traitement-groupe.php?formulaire=supression" method="post">
                                     <p>Nom du groupe : <input type="text" name="nom" /></p>
                                     <p><input type="submit" value="Supprimer"></p>
                                </form>
                                <hr>
                                <p><h4>Rejoindre un groupe:</h4></p>
								<form action="traitement-groupe.php?formulaire=rejoindre" method="post">
                                     <p>Nom du groupe : <input type="text" name="nom" /></p>
                                     <p><input type="submit" value="Rejoindre"></p>
                                </form>
                                <hr>
                                <p><h4>Quitter un groupe:</h4></p>
								<form action="traitement-groupe.php?formulaire=quitter" method="post">
                                     <p>Nom du groupe : <input type="text" name="nom" /></p>
                                     <p><input type="submit" value="Quitter"></p>
                                </form>
                                <hr>
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