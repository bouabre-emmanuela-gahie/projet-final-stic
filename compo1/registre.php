<?php
/* 	Connection a la base de donnees */
$bdd = new PDO('mysql:host=127.0.0.1;dbname=db_cvs', 'root', '');


/* ON echappe les varriables */

if(isset($_POST['forminscription'])) {
   $Nom = htmlspecialchars($_POST['Nom']);
   $pren = htmlspecialchars($_POST['pren']);
   $birth = htmlspecialchars($_POST['birth']);
   $comment = htmlspecialchars($_POST['comment']);
   $mail = htmlspecialchars($_POST['mail']);
   $mail2 = htmlspecialchars($_POST['mail2']);
   $Telephone = htmlspecialchars($_POST['Telephone']);
   $mdp = md5($_POST['mdp']);
   $mdp2 = md5($_POST['mdp2']);
   if(!empty($_POST['Nom']) AND !empty($_POST['pren']) AND !empty($_POST['birth']) AND !empty($_POST['comment']) AND !empty($_POST['mail'])  AND !empty($_POST['mail2']) AND !empty($_POST['Telephone']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) {
      $Nomlength = strlen($Nom);
      if($Nomlength <= 255) {
/* On verifie si les mails correspondent*/   if($mail == $mail2) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
               $reqmail = $bdd->prepare("SELECT * FROM codeuses WHERE email = ?");
               $reqmail->execute(array($mail));
               $mailexist = $reqmail->rowCount();
               if($mailexist == 0) {
                  if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO codeuses(Nom, prenoms, birthday, resume, email, Telephone, mdp) VALUES(?, ?, ?, ?, ?, ?, ?)");
                     $insertmbr->execute(array($Nom, $pren, $birth,  $comment, $mail, $Telephone, $mdp));
                     $erreur = "<p>Cotre Compte a bien été Créé!</p> <a href=\"login.php\">Me connecter</a>";
                  } else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                  }
               } else {
                  $erreur = "Adresse mail déjà utilisée !";
               }
            } else {
               $erreur = "Votre adresse mail n'est pas valide !";
            }
         } else {
            $erreur = "Vos adresses mail ne correspondent pas !";
         }
      } else {
         $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
      }
   } else {
      $erreur = "Veuillez compléter tous les champs !";
   }
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/design.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <title>Accueil</title>
</head>
<body>
  
<nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">SheisthecodeCv</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item"><a class="nav-link" href="#"><span>A propos</span></a></li>
            <li class="nav-item"><a class="nav-link" href="registre.php"><span class="glyphicon-user"></span> S'inscrire</a></li>
            <li class="nav-item"><a class="nav-link" href="login.php"><span class="glyphicon glyphicon-log-in"></span>Se Connecter</a></li>
        </ul>    
      </div>
  </nav>

  <div align="center">
         <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }else{

         echo "Vous avez déja un compte ? Alors <a href=\"login.php\">connectez-vous</a>";

     }
         ?>
</div> 

<!--//Validation-->
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3">
      <h1>Inscription</h1>
       <form method="POST" action="" role="form" >
        <div class="form-group">
          <label for="Nom">Nom :</label>
          <input type="text" placeholder="Entrez Votre Nom " id="Nom" name="Nom" value="<?php if(isset($Nom)) { echo $Nom; } ?>" class="form-control" />
        </div>
        <div class="form-group">
          <label for="pren">Prenoms:</label>
          <input type="text" id="pren" name="pren" placeholder="Prenoms" value="<?php if(isset($pren)) { echo $pren; } ?>" class="form-control" />
        </div>
        <div class="form-group">
          <label for="birth">Date de Naissance:</label>
          <input type="date" class="form-control" id="birth" name="birth" placeholder="jj/mm/aaaa" value="<?php if(isset($birth)) { echo $birth; } ?>" class="form-control" />
        </div>
        <div class="form-group">
          <label for="comment">Resume</label>
          <textarea  class="form-control" name="comment" rows="1" cols="20"></textarea>
        </div>  
        <div class="form-group">
          <label for="mail">Adresse de courriel :</label>
          <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" class="form-control">
        </div>
        <div class="form-group">     
          <label for="mail2">Confirmation de l'adresse de courriel :</label>
          <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="tel">Telephone:</label>
          <input type="Telephone" class="form-control" id="Telephone" placeholder="Telephone" name="Telephone" >
        </div>
        <div class="form-group">
          <label for="mdp">Mot de passe :</label>
          <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp" class="form-control"/>
        </div>
        <div class="form-group">   
          <label for="mdp2">Confirmation du mot de passe :</label>
          <input type="password" placeholder="Confirmez votre mot de pass" id="mdp2" name="mdp2" class="form-control"/>
        </div>    
        <div class="checkbox">
          <label><input type="checkbox" > Remember me</label>
        </div>
          <button type="submit" name="forminscription" class="btn btn-info btn-block"  >Valider</button>
        </form>
      </div>
    </div>
</div>
<br>
<!--//Fin Validation-->
</body>
</html>  