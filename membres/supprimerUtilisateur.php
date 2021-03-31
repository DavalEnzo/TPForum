<?php
require_once "entete.php";
?>
    <?php
    if (isset($_GET["id"])&& !empty($_GET["id"])){
        $idutilisateur = $_GET["id"];
    }
    
    else{
        header("location:index.php");
    }
    
  if(isset($_POST["idUtilisateur"])){
      try{
    
    supprimerUtilisateur();

        ?>
    <div class="alert alert-success">
    L'utilisateur n°<?= $idutilisateur;?> a bien été suprimé.
    <?php
    header("refresh:5;index.php");
    ?>
   
    </div><?php
    }

    catch(Exception $e){
    ?>
            <div class="alert alert-danger">
                Erreur de suppression <br>
                <?=$e->getMessage();?>
            </div>
<?php
}
  }
   
    ?>
    <div class="container text-center my-5">
        <h1 class="cSujet">voulez vous vraiment supprimer l'utilisateur' n°<?=$idutilisateur?>?</h1>
        <form method="POST" class="text-center">
           
            <button type = "submit" name="idUtilisateur" value="<?=$idutilisateur?>" class="btn btn-success">Oui</button>

            <a href="index.php" class="btn btn-danger">Non , retour au forum</a>
        </form>
    </div>



<?php
require_once "pied.php";
?>