<?php
require_once ("entete.php");

if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    ?>
    <div class="alert alert-success">
    Félicitations ! <?=$_GET['nom'];?> vous êtes bien inscrit sur ce magnifique forum !<br>
    <a href="index.php">Retour à l'acceuil</a></div>
    <?php
      header("refresh:3;index.php");
    }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
        ?>
        <div class="alert alert-danger">une erreur s'est produite</div>
        <?php
    }
    ?>
    <div class="container">
        <h1 class="cSujet"> Formulaire d'inscription</h1>
        <form action="../traitement/enregistrementInscription.php" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="login">Nom d'utilisateur</label>
                <input type="text" class ="form-control" name="login" id="login" placeholder="sasissez votre nom d'utilisateur" value="<?=(isset($_POST["nom"]) ? $_POST["nom"] : "");?>"/>
            </div>
        
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" class ="form-control" name="mdp" id="mdp" placeholder="Saisissez votre mot de passe" value="<?=(isset($_POST["mdp"]) ? $_POST["mdp"] : "");?>"/>
                <br>
            </div class="formFile">
            <label for="image" class="formFile">Télécharger une image de profil :</label><br>

                <input class="form-control" type="file" name="image"/>

            
        <div class="text-center my-2">
        <button type="submit" class="btn btn-primary" name="envoi" value ="1">Inscription</button>
        </div>
        </form>
    </div>
<?php    
require_once ("pied.php");
?>