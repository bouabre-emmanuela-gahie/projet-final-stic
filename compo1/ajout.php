<?php 
session_start(); 

$bdd = new PDO('mysql:host=127.0.0.1;dbname=db_cvs', 'root', '');

if(isset($_POST['test']))
{

      $requser = $bdd->prepare("SELECT * FROM experiences WHERE id = ? ");
      $requser->execute(array($_SESSION['id']));
      $user = $requser->fetch();

      if (isset($_POST['Organisation']) AND !empty($_POST['Organisation']) AND $_POST['Organisation'] != $user['entreprise']) 
      {
        
        $ONG = htmlspecialchars($_POST['Organisation']);
        $insertONG = $bdd->prepare("INSERT INTO experiences (entreprise) VALUES(?)");
        $insertONG->execute(array($ONG));
       // header('Location: dashboard.php?id='.$_SESSION['id']);
      }

      if (isset($_POST['Poste']) AND !empty($_POST['Poste']) AND $_POST['Poste'] != $user['poste']) 
      {
        $poste = htmlspecialchars($_POST['Poste']);
        $insertposte = $bdd->prepare("INSERT INTO poste = ? WHERE id = ? ");
        $insertposte->execute(array($poste, $_SESSION['id']));
        header('Location: dashboard.php?id='.$_SESSION['id']);
      }

      if (isset($_POST['comment']) AND !empty($_POST['comment']) AND $_POST['comment'] != $user['comment']) 
      {
        $poste = htmlspecialchars($_POST['comment']);
        $insertposte = $bdd->prepare("INSERT INTO comment = ? WHERE id = ? ");
        $insertposte->execute(array($poste, $_SESSION['id']));
        header('Location: dashboard.php?id='.$_SESSION['id']);
      }

      if (isset($_POST['DateDebut']) AND !empty($_POST['DateDebut']) AND $_POST['DateDebut'] != $user['date_debut']) 
      {
        $date = htmlspecialchars($_POST['DateDebut']);
        $insertdate = $bdd->prepare("INSERT INTO date_debut = ? WHERE id = ? ");
        $insertdate->execute(array($date, $_SESSION['id']));
        header('Location: dashboard.php?id='.$_SESSION['id']);
      }


      if (isset($_POST['DateFin']) AND !empty($_POST['DateFin']) AND $_POST['DateFin'] != $user['date_debut']) 
      {
        $datef = htmlspecialchars($_POST['DateFin']);
        $insertdatef = $bdd->prepare("INSERT INTO date_fin = ? WHERE id = ? ");
        $insertdatef->execute(array($datef, $_SESSION['id']));
        header('Location: dashboard.php?id='.$_SESSION['id']);
      }


 ?>


        
      

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  	 <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>Ajouter Experience</title>
<style>	
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
<!--Fin Navbar-->	
<!-- Section -->
  <section class="row">
        <!-- aside -->
        <aside class="col-sm-4">
          <div class="sidenav">
             <a href="#">Mofifier Profil</a>
            <a href="#">Creer Cv</a>
            <a href="#">Affichier votre Cv</a>
            <a href="#">Ajouter Experience</a>
            <a href="#">Ajouter Diplome</a>
            <a href="#">Ajouter Centre d'Interet</a>
          </div>
        </aside>
        <!-- Fin aside-->                                         
		<!--Valider-->
        <div class="col-lg-6">
          <form method="POST">
            <div class="form-group">
              <label for="ONG">Organisation</label>
              <input type="text" class="form-control" id="ONG" placeholder="Organisation ou Entreprise" required="" name="Organisation">
            </div>
            <div class="form-group">
              <label for="post">Poste Occupe:</label>
              <input type="text" class="form-control" id="post" placeholder="Poste Occupe"
              name="Poste">
            </div>
            <div class="form-group">
              <label for="descr">Description</label>
              <textarea class="form-control" name="comment" rols="2" ></textarea>
            </div>
            <div class="form-group">
               <label for="debut">Date Debut:</label>
               <input type="date" class="form-control" id="debut" placeholder="jj/mm/aaaa"  name="DateDebut">
            </div>
            <div class="form-group">
                <label for="fin">Date Fin:</label>
                <input type="date" class="form-control" id="fin" placeholder="jj/mm/aaaa" name="DateFin">
            </div>
                <div class="row">
  					<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
  						<button type="submit" class="btn btn-info btn-block" name="test">valider</button>
  					</div>
				</div>
          </form>
        </div>
        <!--Fin Valider-->
  </section>
  <!-- End Section -->
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>
<?php 
}
else 
{
  header("Location : login.php");
}

?>