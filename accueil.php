<?php 
	include('header.php');
	
?>
<section class="contenu">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
        <section class="contenu_accueil">
          <div class="main_page">
            <div class="event_msg">
              <div class="panel panel-default" id="event">
                <div class="panel-heading"> <a href="evenement.php">
                  <h3>Evenements</h3>
                  </a> </div>
                <div class="panel-body">
                  <?php 
									$info=date("d/m/Y");
									$dateInfo=date("Y-d-m",strtotime($info));
									//$_SESSION['dateInfo']=$dateInfo;
									$id=$_SESSION['id'];
									$reponse=$bdd->query("SELECT titre,dateDebut,timeDebut FROM evenement INNER JOIN participe ON evenement.id=participe.evtid WHERE participe.userid='$id' AND evenement.dateDebut>='$dateInfo' GROUP BY titre ORDER BY dateDebut ASC LIMIT 3 ;");
									while($data = $reponse->fetch()){
										$titre=$data[0];
										$dateDebut=$data[1];
										$timeDebut=$data[2];
										echo '<p>'.$titre.' le '.$dateDebut.' à '.$timeDebut.'</p>';
									}
								?>
                </div>
              </div>
              <div class="panel panel-default" id="meg">
                <div class="panel-heading"> <a href="messagerie.php?groupid=0">
                  <h3>Utilisateur</h3>
                  </a> </div>
                <div class="panel-body">
                  <p> rechercher un autre utilisateur: </p>
                  <form action="VisitUtilisateur.php" method="post">
                    <input type="search" results="5" placeholder="Rechercher.." name="recherche">
                  </form>
                </div>
              </div>
            </div>
            <div class="group_cal_tab">
              <div class="group_cal">
                <div class="panel panel-default" id="group">
                  <div class="panel-heading"> <a href="groupes_amis.php">
                    <h3>Groupes</h3>
                    </a> </div>
                  <div class="panel-body">
                    <?php 
                            $rep = $bdd->prepare('SELECT groupe.nom,groupe.id FROM groupe INNER JOIN appartenance ON groupe.id = appartenance.groupId INNER JOIN utilisateur ON utilisateur.id = appartenance.userId WHERE userId="'.$_SESSION['id'].'"');
                            $rep->execute(); 
							$i=0;
                            while($donnees = $rep->fetch() and $i<3){
								echo '<p>';
                                echo '<a href="messagerie.php?groupid='.Securite::html($donnees['id']).'">* '.Securite::html($donnees['nom']).'</a>';
								echo '</p>';
								$i++;
                            }
                        ?>
                  </div>
                </div>
                <div class="panel panel-default" id="calendrier">
                  <div class="panel-heading"> <?php echo '<a href="calendrier.php?info='.date("m/d/Y").'"><h3>Calendrier</h3></a>' ?> </div>
                  <div class="panel-body" style="background-color: aliceblue;">
                    <div>
                      <nav> <span>
                        <button id="lastYear">◀</button>
                        <label id="year"></label>
                        <button id="nextYear">▶</button>
                        </span> <span>
                        <button id="lastMonth">◁</button>
                        <label id="month"></label>
                        <button id="nextMonth">▷</button>
                        </span> <span>
                        <label id="dateInfo"></label>
                        </span>
                        <button id="backToday">Aujourd'hui</button>
                      </nav>
                    </div>
                    <div class="large100" id="calendar" >
                      <table id="dateZone">
                        <thead>
                          <tr>
                            <td>Dim</td>
                            <td>Lun</td>
                            <td>Mar</td>
                            <td>Mer</td>
                            <td>Jeu</td>
                            <td>Ven</td>
                            <td>Sam</td>
                          </tr>
                        </thead>
                        <tbody id="dateTable">
                        </tbody>
                      </table>
                      <script src="js/calendrierAccueil.js"></script> 
                    </div>
                  </div>
                </div>
              </div>
              <div id="tableau">
                <div class="panel panel-default">
                  <div class="panel-heading"> <a href="tableauAffichage.php">
                    <h3>Tableau d'Affichage</h3>
                    </a> </div>
                  <div class="panel-body" id="tableau-body">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<div id="myCarousel" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        
        </ol>   
        
        <div class="carousel-inner">
            <div class="item active">
                <img src="image/Gala (1).gif" alt="Gala">
            
             <div class="carousel-caption">
        <h5 class="animated zoomInLeft">Gala 2017 Ensisa</h5>
      </div></div>

			 <div class="item">
                <img src="image/project.jpg" alt="projets">          

             </div>

            <div class="item">
                <img src="image/ensisa-france2-2017-bueno-768x480-730x410.jpg" alt="TV">          
               <div class="carousel-caption">
        <h5 class="animated rotateIn">Ensisa encore à la TV</h5>
      </div>
             </div>

            <div class="item">
                <img src="image/ensisa1.jpg" alt="oraux">
            
             <div class="carousel-caption">
        <h5 class="animated rotateIn">Préparation des oraux à l'ensisa</h5>
        </div>
        </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="lien_externe">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3>Lien</h3>
                </div>
                <div class="panel-body">
                  <nav>
                    <ul>
                      <li><a href="http://www.ensisa.uha.fr">Ensisa</a></li>
                      <li><a href="http://www.e-services.uha.fr">E-Services</a></li>
                      <li><a href="http://www.uha.fr">Uha</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</section>
<?php
	include('footer.php');
?>