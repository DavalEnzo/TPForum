<?php
require_once "entete.php";

if (isset($_GET["idPost"])&& !empty($_GET["idPost"])){
    $idPost = $_GET["idPost"];
    $post = selectionnerPost($idPost);
}
else{

    header("location:index.php");
}
//vérification du formulaire
if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    header("refresh:2;../membres/Posts.php?idPost=".$idPost);
    ?>
            <div class="alert alert-success ">
            Le post <?=$post["sujet"];?> a bien été modifié.
            </div>
    <?php
   }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
       header("refresh:2;../membres/modifierPost.php");
             ?>
                    <div class="alert alert-danger">
                    Erreur de modification <br>
                    </div>

           <?php
               }else{
   ?>

<div class="container">
    <h1 class="cSujet">Modification du message n ° <?=$idPost;?></h1>
    <div class="container">
        <form method="post" action="../traitement/modifierPost.php?id=<?=$idPost?>">
                <label class="form-label" for="contenu">Réponses</label>
                <textarea class ="form-control" name="contenu" id="contenu" rows="3"><?=$post["contenu"];?></textarea>   
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Modifier le sujet</button>
        </div>
        </form>
    </div>
</div>
<?php
               }