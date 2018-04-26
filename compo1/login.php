<?php

session_start();
/* connexion a la base de donnees */

$bdd = new PDO('mysql:host=127.0.0.1;dbname=db_cvs', 'root', '');
/* On verifie si l'utilisateur est connecté */

if (isset($_POST['formconnexion']))
{
  $mail =  htmlspecialchars($_POST['mail']);
  $mdp = md5($_POST['mdp']);
  if (!empty($mail) AND !empty($mdp))   
  {
     $requser = $bdd->prepare("SELECT * FROM codeuses WHERE email =  ? AND mdp = ? ");
     $requser->execute(array($mail, $mdp));
     $userexist = $requser->rowCount();
      if ($userexist == 1)
      {
        $userinfo = $requser->fetch();
        $_SESSION['id'] = $userinfo ['id'];
        $_SESSION['Nom'] = $userinfo ['Nom'];
        $_SESSION['mail'] = $userinfo ['mail'];
        header("Location: dashboard.php?id=".$_SESSION['id']);

      }
      else
      {
        $erreur = "Mauvais Mail ou Mot de Passe !";
      }
  }
  else
  {
    $erreur = "Remplissez le formulaire"; 
  }

}


?>



<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/design.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
</head>
<body>

<!--debut navbar--> 
<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">SheisthecodeCv</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="#"><span>A propos</span></a></li>
            <li class="nav-item"><a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span>Se Connecter</a></li>
            <li class="nav-item"><a class="nav-link" href="registre.php"><span class="glyphicon glyphicon-log-in"></span>S'Inscrire</a></li>
        </ul>    
      </div>
  </nav>
<!--Fin Navbar-->


  <!--formulaire-->
<div>
  <div class="login" >
      <img src="img/img_avatar2.png" class="avatar">
      <h2>Login</h2>
        <form method="POST" action="" role="form" >
         <div class="form-group">
           <label for="mail">Adresse de courriel :</label>
           <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="mdp">Mot de pass :</label>
            <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" class="form-control"/>
          </div>
          <input type="submit" name="formconnexion" value="Se connecter">
        </form> 
        <div align="center">
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }else{

         echo "Pas encore Inscris? Alors <a href=\"registre.php\">Inscrivez-vous !</a>";

     }
         ?>
</div>   
  </div> 
</div>



</body>
</html>