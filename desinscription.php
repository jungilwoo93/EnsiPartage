<?php
	include('header.php');
?>
<section class="contenu">
<section class="contenu_accueil">
	<div class="main_page">
		<div class="lien_externe">
			<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Desinscription</h3>
					</div>
					<div class="panel-body">
					<?php 
					echo "<p>".$_SESSION['nom']." ".$_SESSION['prenom'].", vous souhaitez vous désinscrire de nos services. Nous vous informons que toute désinscription est définitive, toutes les données liées au compte seront supprimées, sans récupérations possible. Vous serez informés de l'aboutissement de la procédure.</p>";
					echo "<p> Soucieux de fournir un service de bonne qualités, nous vous invitons à saisir la raison de la désinscription. Nous en tiendrons compte, et modifirons en consequences nos services dans les mises à jours ultérieures.</p>";
					?>
                    <form action="traitement.php" method="post">
                        <p>
                            <input type="hidden" name="nom" value=<?php echo $_SESSION['nom']; ?>/>
                        </p>
                        <p>
                            <input type="hidden" name="prenom" value=<?php echo $_SESSION['prenom']; ?>/>
                        </p>
                        <p>
                            <input type="hidden" name="mail" value=<?php echo $_SESSION['mail']; ?>/>
                        </p>
                        <p>La raison:
                        <select name="objet">
                            <option value="rien du tout">Ne se prononce pas</option>
                            <optgroup label="Technique">
                                    <option value="mauvais fonctionnement">Mauvais fonctionnement du service</option>
                                    <option value="mauvaise inscription">Mauvaise inscription initiale</option>
                            </optgroup>
                            <optgroup label="Personnel">
                                    <option value="plus utile">N'est plus utile pour mon utilisation</option>
                                    <option value="partit">Je quitte l'ENSISA</option>
                                    <option value="trop de donnees">Trop de données sauvegardées</option>
                            </optgroup>
                        </select>
                        </p>
                        <p>
                            <label for="message">Commentaire supplémentaire:</label>
                            <p>
                                <textarea name="message" cols="80" rows="15"> </textarea>
                            </p>
                        </p>
                        <p>
                            <input type="hidden" name="tokenDesinscrit" value=1/>
                        </p>
                        <p>	

							<?php 	
								$supression = $bdd->prepare('DELETE FROM utilisateur WHERE utilisateur.Id="'.$_SESSION['id'].'"');
								$supression->execute();
								$_SESSION['tokenDesinscription']='true';
							?>

                            <input type="submit" value="Desinscription" name="envoi" OnClick="return confirm('Voulez-vous vraiment effacer votre compte ?');"/>
                            <input type="reset" value="Vider le formulaire" />
                        
                        </p>
					</form>
					
					</div>
				</div>
			
			
		</div>
	</div>
</section>
</section>

<?php
	include('footer.php');
?>