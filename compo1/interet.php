<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=db_cvs', 'root', '');

if(isset($_SESSION['id']))

{

}

else 
{

  header("Location : login.php");
}

if (isset($_GET['id']) AND $_GET['id'] > 0 ) 
{
  $obtenirid = intval($_GET['id']);
  $requser = $bdd->prepare('SELECT * FROM codeuses WHERE id = ?');
  $requser->execute(array($obtenirid));
  $userinfo = $requser->fetch();
}



 ?>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <title>Centre d'Interet</title>

<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="accueil.php">SheisthecodeCv</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="#"><span>A propos</span></a></li>
            <li class="nav-item"><a class="nav-link" href="registre.php"><span class="glyphicon-user"></span> S'inscrire</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span>Se Connecter</a></li>
            <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="cree.php">creer votre Cv</a></li>
            <li><a href="ajout.php">Ajouter Cv</a></li>
            <li><a href="cv.php">Curiculum Vitae</a></li>
            <li><a href="login.php">Se Connecter</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>
          </ul>
        </ul>    
      </div>
  </nav>
  <!-- Fin Navbar-->


        <h1 class="col-lg-offset-3 col-md-offset-3">Ajouter Centre d'Interêt <hr> <span style="color: #ef5861"></span></h1>
        <form method="post" action="traitement/t_eleve_login.php">
            <div class="banner">
    <div class="lead">
    </div>
  </div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
    <div class="form-group">
      <label>Centre d'interêt</label>
     <select class="form-control">        
                <option>Sport</option>        
                <option>Lecture</option>        
                <option>Musique</option> 
                <option>Danse</option>    
             </select> 
    </div>

  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
    <div class="form-group">
      <label>Description</label>
   <textarea class="form-control" name="comment" rols="2" ></textarea>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
  <button type="submit" class="btn btn-primary">valider</button>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
</div>




   </form>
      </div>
    </div>
   
    
