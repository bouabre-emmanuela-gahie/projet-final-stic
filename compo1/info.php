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
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<title>Compo</title>
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style2.css">
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
    			<li class="nav-item"><a class="nav-link" href="deconnexion.php"><span class="glyphicon glyphicon-log-in"></span>Deconnexion</a></li>
        </ul>    
  		</div>
  </nav>
<!--Fin Navbar-->	                                        
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
<div class="col-sm-6" style="position: right;">
		

	<div class="row" id="BlocHaut">
			
			
		
	<div class="page">
		

	<div class="info-photo"></div>
		<div class="info">
			<p><strong>Gahie Bouabre Emmanuela</br>
			</strong>Née le 26 Novembre 1998 </p> </br>
			<p>Abidjan yopougon Maroc</br>
			+225 48450720</br>Bouabreemmanuela@gmail.com</p>
			<p></p>
		</div>

        <div class="row" id="BlocHautdroit">
		<div class="photo">
			<span class="icon-bar"></span>
			<img src="img/cardc.jpg"
             alt="description de l'image" 
              height="150"
              width="150" style="border-radius: 90px;
              background-position: right;">
		</div></div>
	</div>
	<div class="section">

		<div class="sec-gauche " id="forma-gauche">
			
			<p> 2017 à Aujourd'hui </p>

			<p>2014-2017</p>
			<p>2010-2013</p>
			<p>2004-2009</p>
		</div>
		
		<div class="sec-droite"><br>
			<p><span class="titre"> suivie de formation en informatique au programme SheIsTheCode</span></p></br>
			<p><span class="titre">cycle secondaire au collège Pierre le Grand de Yopougon 
			obtention du baccalaureat scientique</span></p></br>
			<p><span class="titre"> obtention du brevet BEPC au College Pierre le grand</span></p></br>
			<p><span class="titre">Cycle primaire a Notre dame de l'Annonciation de yopougon et obtention du CEPE a l'ecole primaire la BAD</span></p>
		</div>
	</div>
	<div class="section">
		<h2>experiance professionnel</h2>
		<div class="sec-gauche ">
			<p> juillet 2017 à aujourd'hui</br><span class="duree"></span> (4 mois) </p>
            <div id="exp-gauche">
			</div></div>
		
		<div class="sec-droite" style="text-align: right;"><p><span class="titre"> Stagiaire
		 SheIsThecode</span></p></div>
	</div>


	<div class="section">
		<h2>langues parlées et autres compétances</h2>
		<div class="sec-gauche " >
			<p> Français</br>
			 Anglais </p>
			<p> informatique </p>
			<p> Decoration</p>
			<p> Emballage cadeaux</p>
			<p>
			 Maitrise: Des logiciels powerpoint, excel , world, maitrise également<br>
			 les languages tels que: css et html bonne maitrise 
			de la décoration de mariage</p> 
				
	<h2>Centres d'interêts</h2><br>

			<p>Interêts:</p>
			<p><span class="titre"> informatique, decoration,<br> entrepreuneriat,lecture,language de programmation, </span>
			</p>
		</div>

		
	</div>

	<br>
	</div>
</div>

	




</div>



</body>
</html>