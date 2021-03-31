<?php require_once 'entete.php' ?>

<?php

if($_SESSION['idRole'] != 2){
    header('location:index.php');
}
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $idCategorie= $_GET['id'];
        $categorie= recupCategorie($idCategorie);
    }else{
        header('../membres/index.php');
}

if(isset($_GET["success"])&& $_GET['success'] == 1 ){
         header("refresh:2;../membres/optionCategorie.php");
        ?>
            
             <div class="alert alert-primary ">La catégorie <?=$_GET["libelle"];?> a bien été supprimée, retour à la liste des catégories</div>
        <?php
        }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
            header("refresh:2;../membres/supprimerCategorie.php");
                  ?>
                   <div class="alert alert-danger">Erreur lors de la suppression de la catégorie</div>
                  <?php
    }else{
            ?>
            <h1 class="text-center cSujet">Êtes-vous sûr de vouloir supprimer la catégorie <?=$categorie['libelle'];?> ?</h1>
            <form method="post" action="../traitements/supprimerCategorie.php?id=<?=$idCategorie?>">
            <div class="container w-25"style="margin:auto">
                <div class=" text-center my-5">
                    <button type="submit" class="btn btn-danger" name="idCategorie" value="<?=$idCategorie;?>">Oui</button>
            </form>
                    <a class="btn btn-success" href="index.php">Non</a>
                </div>
            </div>
                <?php
         }