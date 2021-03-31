<?php
require_once "entete.php";
?>
    <?php
       if(isset($_GET['success']) && $_GET['success'] == 1){
        header("refresh:2;../membres/index.php");
        ?>
           ?>
        <div class="alert alert-success">
        Le post a bien été suprimé.
        </div>
        <?php
       }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
?>
            <div class="alert alert-danger">Erreur de suppression</div>
            <?php
       }
    ?>
    <div class="container text-center my-5">
        <h1 class="cSujet">voulez vous vraiment supprimer le post n°<?=$_GET['idPost']?>?</h1>
        <form method="POST" class="text-center" action="../traitement/supprimerPost.php">
           
            <button type = "submit" name="idPost" value="<?=$_GET['idPost']?>" class="btn btn-success">Oui</button>

            <a href="index.php" class="btn btn-danger">Non , retour au forum</a>
        </form>
    </div>