<?php 
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=db_cvs', 'root', '');

if(isset($_SESSION['id']))

{

}

else 
{
  /* Redirige l'utilisateur qui n'est pas connecté */
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>Diplome</title>
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
    background-color: none;
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
        </ul>    
  		</div>
  </nav>
<!--Fin Navbar-->
<!--Section containers -->
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
          <form>
            <div class="form-group">
              <label for="Etablissement">Etablissement:</label>
              <input type="text" class="form-control" id="Etablissement" placeholder="Email" required="">
            </div>
            <div class="form-group">
              <label for="Diplome">Diplome:</label>
              <input type="text" class="form-control" id="Diplome" placeholder="" required="">
            </div>
            <div class="form-group">
              <label for="Date">Date d'obtention</label>
              <input type="google+" class="form-control" id="Date" placeholder="jj/mm/aaa"  required="">
            </div>  
              <button type="submit" class="btn btn-info btn-block">Valider</button>
          </form>
        </div> 
  </section>
    <!-- Fin Section -->          
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>


</html>