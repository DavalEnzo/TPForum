<?php
require_once 'entete.php';


if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
        <div class="alert alert-success">
            Bienvenue sur le forum <?=$_GET['login'];?> ,vous êtes connecté.<br>
            <a href="index.php">Retour à l'accueil</a> 
        </div>
      <?php 
  }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
      ?>
          <div class="alert alert-danger">
                        Erreur: <?= $_GET['erreurs'];?>
            </div>
      <?php
  }
    ?>

    <div class="container">
        <h1 class="cSujet">Formulaire de connexion</h1>
        <form method="post" action="../traitement/connexions.php">
            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="login" id="login" placeholder="Saisissez votre nom d'utilisateur" value="<?=(isset($_POST["login"]) ? $_POST["login"] : "")?>" required/>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Saisissez votre mot de passe" value="<?=(isset($_POST["mdp"]) ? $_POST["mdp"] : "")?>" required/>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-success my-3" name="envoi" value="1">Connexion</button>
            </div>
        </form>
    </div>
<?php
require_once "pied.php";
?>