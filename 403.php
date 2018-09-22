<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Error 403</title>

<!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" href="index.php">Accueil</a>
	  </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">


</div>
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
    <center><a href="accueil.php"/><img src="image/logo.png" alt="EnsiPartage"/></a></center>
    <h1 class="text-center">403 Acces non autorisé</h1>
    </div>
  </div>
  <hr>
</div>
<div class="container">
  <div class="row text-center">
    <div class="col-md-6 col-md-offset-3">
      <p>La page que vous souhaitez atteindre ne vous est pas autorisée.</p>
      <p>Vous pouvez retourner a l'accueil, ou nous contacter si le probleme persiste. </p>
      <p></p>
      <p><a href="contact.php"><h3>Formulaire de Contact</h3></a></p>
    </div>
  </div>
  <hr>
<hr>

  <hr>
  <div class="row">
    <div class="text-center col-md-6 col-md-offset-3">
      <h4>EnsiPartage</h4>
      <p>Copyright &copy; 2017 &middot; Tout droit réservé &middot; <a href="/index.php" >EnsiPartage</a></p>
    </div>
  </div>
  <hr>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script src="error/js/jquery-1.11.2.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="error/js/bootstrap.js"></script>
</body>
</html>
