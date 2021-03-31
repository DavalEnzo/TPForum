<?php
require_once "entete.php";
    ?>

<?php
if(isset($_GET["idPost"]) &&!empty($_GET['idPost'])){

        $idPost = $_GET["idPost"];

        $Posts = selectionnerPosts($idPost);

            
    }else{
        
        header("index.php");
    }

    if(isset($_POST["contenu"]) && !empty($_POST["contenu"])){

            $contenu = $_POST["contenu"];
            $idUtilisateur =  $_SESSION["idUtilisateur"];
        
        try{
            repondre($contenu,$idPost,$idUtilisateur);
            ?>
            <div class="alert alert-success mt-3">Votre réponse à bien été posté.</div>
            <?php
            header('refresh:3;index.php');
            }catch(Exception $e){
                echo "Il y a une erreur";
                echo $e->getMessage();
            }  
    } 
?>

        <?php
         foreach($Posts as $Post){
             ?>
            <div class="container" style="width: 100rem; margin:auto">
                <div class="card-body">
                    <h3 class="card-title cSujet">Sujet : <?=$Post["sujet"]?></h3>
                    <h5 class="card-title cSujet">Par : <?=$Post["login"]?></h5>
                    <p class="card-text cSujet"><?=$Post["contenu"]?></p>
                    <div class="col-md-10">
            <div>
            <div class="card-header ">
                <p class="text-end">Posté le : <?=$Post["date_heure"]?></p>
            </div>
            <?php        
                    if(isset($_SESSION['idRole']) && !empty($_SESSION['idRole'])){
            if($_SESSION["idRole"] == 2){
                ?>
                <a class= "btn btn-warning"href="modifierPost.php?idPost=<?=$Post["idPost"]?>">Modifier</a>
                <a class= "btn btn-danger" href="supprimerPost.php?idPost=<?=$Post["idPost"]?>">Supprimer</a>
            <?php
            }
            if($_SESSION["idRole"] == 3 && $_SESSION['idCategorie'] == $Post['idCategorie'] ){
                ?>
                <a class= "btn btn-warning"href="modifierMessage.php?idPost=<?=$Post["idPost"]?>">Modifier</a>
                <a class= "btn btn-danger" href="supprimerMessage.php?idPost=<?=$Post["idPost"]?>">Supprimer</a>
            <?php
            }
        }
        ?>
                </div>
            </div>
      <?php      
        }
        ?>
        </br>
    <div class="container">
        <form method="post">
                <label class="form-label" for="contenu">Réponses</label>
                <textarea class ="form-control" name="contenu" id="contenu" placeholder="Saisisser le contenu de votre post" rows="3"></textarea>   
        <div class="form-group text-center">
            <input type="submit" class="btn btn-primary my-2" value="Ajouter la réponse"></input>
        </div>
        </form>
    </div>
    <?php

    $reponses = afficherReponses();
      foreach($reponses as $reponse){
            ?>
<div class="container" >
    <div class="card opaque  my-3 " style="margin:auto">
        <div class="row g-0" >
            <div class="col-md-2 card-header">
                <img src="<?=$reponse["imgProfile"]?>" style="max-width: 100%;">
                <?php
                if($reponse["idRole"] == 2){
                ?>
                <h5 class="text-center" style="color: red;"><?=$reponse['login']?></h5>
                <?php
                }else if($reponse["idRole"] == 3){
                    ?>
                    <h5 class="text-center" style="color: blue;"><?=$reponse['login']?></h5>
                    <?php
                }else{
                    ?>
                    <h5 class="text-center" style="color: blue;"><?=$reponse['login']?></h5>
                    <?php
                }
                ?>
            </div>
            <div class="col-md-10">
            <div>
            <div class="card-header ">
                <p class="text-end">Posté le : <?=$reponse["date_heure"]?></p>
            </div>
            <div  class="card-body">
            <p class="card-text flex-end" style="display: inline-block;"><?=$reponse["contenu"]?></p>
            </div>
           
            </div>
            </div>
        </div>
        <?php
        if(isset($_SESSION['idRole']) && !empty($_SESSION['idRole'])){
            if($_SESSION["idRole"] == 2){
                ?>
                <a class= "btn btn-warning"href="modifierMessage.php?id=<?=$reponse["idReponse"]?>">Modifier</a>
                <a class= "btn btn-danger" href="supprimerMessage.php?id=<?=$reponse["idReponse"]?>">Supprimer</a>
            <?php
            }
            if($_SESSION["idRole"] == 3 && $_SESSION['idCategorie'] == $Post['idCategorie'] ){
                ?>
                <a class= "btn btn-warning"href="modifierMessage.php?id=<?=$reponse["idReponse"]?>">Modifier</a>
                <a class= "btn btn-danger" href="supprimerMessage.php?id=<?=$reponse["idReponse"]?>">Supprimer</a>
            <?php
            }
        }
            ?>
    </div>
</div>
    <?php
}; 
require_once("pied.php");
?>

