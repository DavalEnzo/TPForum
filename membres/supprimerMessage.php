<?php
require_once "entete.php";

if (isset($_GET["id"])&& !empty($_GET["id"])){
    $idreponse = $_GET["id"];
    $reponses = recupReponse($idreponse);
    } else{
        header("location:index.php");
    }
if(isset($_GET["success"])&& $_GET['success'] == 1 ){
        header("refresh:2;../membres/Posts.php?idPost=".$_GET['idPost']);
        ?>
        <div class="alert alert-success">
        Le Message a bien été suprimé.
    <?php
       }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
           header("refresh:2;../membres/supprimerMessage.php");
           ?>
           <div class="alert alert-danger">
               Erreur de modification <br>
              
           </div>
    <?php
   }else{
           ?>
    <div class="container">
     <h1 class="cSujet">voulez vous vraiment supprimer la reponse n°<?=$idreponse?>?</h1>
        <form method="POST" action="../traitements/supprimerMessage.php">
           
            <button type = "submit" name="idReponse" value="<?=$idreponse?>" class="btn btn-success">Oui</button>

            <a href="index.php" class="btn btn-danger">Non , retour au forum</a>
        </form>
    </div>



<?php
   }
require_once "pied.php";
?>