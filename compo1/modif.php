<?php 
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=db_cvs', 'root', '');

if(isset($_SESSION['id']))
	/* Envoi des données dans la base de données */
{

	$requser = $bdd->prepare("SELECT * FROM codeuses WHERE id = ? ");
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();

	if (isset($_POST['modifNom']) AND !empty($_POST['modifNom']) AND $_POST['modifNom'] != $user['Nom']) 
	{
		$newname = htmlspecialchars($_POST['modifNom']);
		$insertname = $bdd->prepare("UPDATE codeuses SET nom = ? WHERE id = ? ");
		$insertname->execute(array($newname, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}


	

	if (isset($_POST['modifPrenom']) AND !empty($_POST['modifPrenom']) AND $_POST['modifPrenom'] != $user['prenoms']) 
	{
		$newPrenom = htmlspecialchars($_POST['modifPrenom']);
		$insertPrenon = $bdd->prepare("UPDATE codeuses SET prenoms = ? WHERE id = ? ");
		$insertPrenon->execute(array($newPrenom, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}


	if (isset($_POST['modifbirth']) AND !empty($_POST['modifbirth']) AND $_POST['modifbirth'] != $user['birthday']) 
	{
		$newbirth = date("d-m-Y"($_POST['modifbirth']));
		$inserbirth = $bdd->prepare("UPDATE codeuses SET birthday = ? WHERE id = ? ");
		$insertbirth->execute(array($newbirth, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}
	

	if (isset($_POST['comment']) AND !empty($_POST['comment']) AND $_POST['comment'] != $user['resume']) 
	{
		$newresume = htmlspecialchars($_POST['comment']);
		$inserresume = $bdd->prepare("UPDATE codeuses SET resume = ? WHERE id = ? ");
		$insertresume->execute(array($newresume, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}


     if (isset($_POST['modifContact']) AND !empty($_POST['modifContact']) AND $_POST['modifContact'] != $user['Telephone']) 
	{
		$newContact = htmlspecialchars($_POST['modifContact']);
		$inserContact = $bdd->prepare("UPDATE codeuses SET Telephone = ? WHERE id = ? ");
		$insertContact->execute(array($newContact, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}

	if (isset($_POST['modifmail']) AND !empty($_POST['modifmail']) AND $_POST['modifmail'] != $user['email']) 
	{
		$newmail = htmlspecialchars($_POST['modifmail']);
		$insertmail = $bdd->prepare("UPDATE codeuses SET email = ? WHERE id = ? ");
		$insertmail->execute(array($newmail, $_SESSION['id']));
		header('Location: dashboard.php?id='.$_SESSION['id']);
	}
	


   if (isset($_POST['modifpassword1']) AND !empty($_POST['modifpassword1']) AND isset($_POST['modifpassword2']) AND !empty($_POST['modifpassword2']))
	{
		$mdp1 = md5($_POST['modifpassword1']);
		$mdp2 = md5($_POST['modifpassword2']);

		if ($mdp1 == $mdp2) 
		{
			$insertmdp = $bdd->prepare("UPDATE codeuses SET mdp = ? WHERE id = ? ");
			$insertmdp->execute(array($mdp1, $_SESSION['id']));
			header('Location: dashboard.php?id='.$_SESSION['id']);
			
		}
		else
		{
			$msg = "Vos mots de passe ne sont pas identiquent";
		}

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
	<title>Modifier votre profil</title>
</head>
<body>
	<!--Navbar-->
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="index.php">SheisthecodeCv</a>
    		</div>
    		<ul class="nav navbar-nav navbar-right">
	    			<li class="nav-item"><a class="nav-link" href="#"><span>A propos</span></a></li> 
	      			<li class="nav-item"><a class="nav-link" href="deconnexion.php"><span class="glyphicon glyphicon-log-in"></span>Deconnexion</a></li>
        	</ul>    
  		</div>
    </nav>
<!--Fin Navbar-->	                   
<div class="container">
    <div class="row">
	    <div class="col-sm-6 col-sm-offset-3">
			<i> <h1>MODIFIER PROFIL</h1></i>
			<form method="POST" action="" enctype="mutipart/form-data">
				<div class="form-group">
					<label>Nom</label>
					<input type="text" name="modifNom" class="form-control" placeholder="entrer votre Nom ici" />
			    </div>
				<div class="form-group">
					<label>Prenom</label>
					<input type="text" name="modifPrenom" class="form-control" placeholder="entrer votre Prenom ici"> 
				</div>
				<div class="form-group">
					<label for="birth">Date de Naissance:</label>
                    <input type="date" class="form-control" id="birth" name="modifbirth" placeholder="jj/mm/aaaa" value="<?php if(isset($birth)) { echo $birth; } ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label for="comment">Resume</label>
                    <textarea  class="form-control" name="comment" rows="1" cols="20"></textarea>
				</div>
	            <div class="form-group">
	                <label>Contact</label>
					<input type="text" name="modifContact" class="form-control" placeholder="entrer votre Contact ici"> 
			    </div>
			    <div class="form-group">
					<label>Email</label>
					<input type="email" name="modifemail" class="form-control" placeholder="entrer votre email ici">
			    </div>
			    <div class="form-group">
				    <label>Mot de passe</label>
					<input type="password" name="modifpassword1" class="form-control" placeholder="entrer votre mot de passe">
				</div>
				<div class="form-group">   
	                <label for="mdp2">Confirmation du mot de passe :</label>
	                <input type="password" placeholder="Confirmez votre mot de pass" id="mdp2" name="modifpassword2" class="form-control"/>
	            </div>
	            <div class="form-group">   
	                <label for="avatar">Photo de profil :</label>
	                <input type="file" name="avatar" class="form-control"/>
	            </div>        
			    <div class="row">
				  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3">
				  <button type="submit" class="btn btn-primary" >Modifier</button>
				</div>

			</form>
			
			<?php

			   if (isset($erreur)) 
			   
			   {echo $erreur;} ?>
	    </div>
	</div>
</div>
<script src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>
</html>
<?php 
}
/* Redirige l'utilisateur qui nest pas connecté */
else 
{
	header("Location : login.php");
}

?>