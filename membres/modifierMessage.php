<?php
require_once "entete.php";

//sinon récupération depuis l'url
if (isset($_GET["id"])&& !empty($_GET["id"])){
    $idreponse = $_GET["id"];
    
}
else{

    header("location:index.php");
}
//vérification du formulaire
if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    header("refresh:2;../membres/Posts.php?idPost=".$_GET["idPost"]);
    ?>
    <div class="alert alert-success">
    Le message a bien été modifié.
    </div>
    <?php
   }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
       header("refresh:2;../membres/modifierMessage.php");
             ?>
               <div class="alert alert-danger">
                   Erreur de modification du message <br>
               </div>
               <?php
               }else{
   ?>

<div class="container">
    <h1 class="cSujet">Modification du message n ° <?=$idreponse;?></h1>
    <div class="container">
        <form method="post" action="../traitements/modifierMessage.php?id=<?=$idreponse?>">
                <label class="form-label" for="contenu">Réponses</label>
                <textarea class ="form-control" name="contenu" id="contenu" rows="3" ><?=$reponses["contenu"]?></textarea>   
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Modifier le message</button>
        </div>
        </form>
    </div>
</div>
<?php
               }