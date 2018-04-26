<?php 
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=db_cvs', 'root', '');

if(isset($_SESSION['id']))
{

  $requser = $bdd->prepare("SELECT * FROM codeuses WHERE id = ? ");
  $requser->execute(array($_SESSION['id']));
  $user = $requser->fetch();

  if (isset($_POST['Facebook']) AND !empty($_POST['Facebook']) AND $_POST['Facebook'] != $user['pseudo']) 
  {
    $newname = htmlspecialchars($_POST['modifNom']);
    $insertname = $bdd->prepare("INSERT codeuses  nom = ? WHERE id = ? ");
    $insertname->execute(array($newname, $_SESSION['id']));
    header('Location: dashboard.php?id='.$_SESSION['id']);
  }
 else  {
    header('Location: login.php')
  } 

}  

?>



<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  	<link href="css/font-awesome.min.css" rel="stylesheet">
	<title>Creer Cv</title>
	 <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 50%;
    width: 200px;
    background-position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    padding-top: 5px;
}

.sidenav a {
    padding: 6px 6px 6px 32px;
    text-decoration: none;
    font-size: 1.0em;
    color: blue;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 200px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 0px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>
	<!--Navbar-->
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
            <li><a href="login.php">Se Connecter</a>
            <li><a href="dashboard.php">Dashboard</a></li>	
          </ul>
        </ul>    
  		</div>
  </nav>
  <!-- Section -->
  <section class="row">
        <!-- aside -->
        <aside class="col-sm-4">
          <div class="sidenav">
             <a href="modif.php">Mofifier Profil</a>
            <a href="cree.php">Creer Cv</a>
            <a href="cv.php">Affichier votre Cv</a>
            <a href="ajout.php">Ajouter Experience</a>
            <a href="dip.php">Ajouter Diplome</a>
            <a href="interet.php">Ajouter Centre d'Interet</a>
          </div>
        </aside>
        <!-- Fin aside-->
        <!-- Valider -->
        <div class="col-lg-6">
          <h1 class="col-lg-offset-3 col-md-offset-3">CREER CV 
 	   <span style="color: #ef5861"></span></h1>
       <form method="post" action="">
            <div class="form-group">
              <label for="fb">Facebook:</label>
              <input type="fb" class="form-control" id="Facebook" placeholder="User Profil Facebook" required="" name="Facebook">
            </div>
            <div class="form-group">
              <label for="pwd">Twitter:</label>
              <input type="Twitter" class="form-control" id="tw" placeholder="User Profil Twitter" required="">
            </div>
            <div class="form-group">
              <label for="google+">Google+</label>
              <input type="google+" class="form-control" id="goog" placeholder="User Profil Google" required="">
            </div>  
              <button type="submit" class="btn btn-info btn-block">Valider</button>
          </form>
        </div> 
    </section>
    <!-- Fin Section -->      
   </body>
</html>