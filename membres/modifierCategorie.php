<?php require_once 'entete.php' ?>

<?php
    if($_SESSION['idRole'] != 2){
        header('location:index.php');}
    if(isset($_GET['id']) && !empty($_GET['id'])){
            $idCategorie = $_GET['id'];
        }    
if(isset($_GET["success"])&& $_GET['success'] == 1 ){
    header("refresh:2;../membres/optionCategorie.php");
            ?>
        <div class="alert alert-success">
            La catégorie <?=$_GET["libelle"];?> a bien été modifiée<br>
        </div>
              <?php 
    }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
        header("refresh:2;../membres/modifierCategorie.php");
              ?>
                <div class="alert alert-danger">
                    une erreur s'est produite lors de la modification
                </div>
              <?php
}
    $categories= recupCategorie($idCategorie);
?>

    <h1 class="text-center cSujet">Modification de la catégorie <?=$categories['libelle'];?></h1>
    <form method="post" class="form-group" action="../traitements/modifierCategorie.php?id=<?=$idCategorie?>">
    <input type="text" class="form-control" name="libelle" id="libelle" placeholder="Saisissez la nouvelle catégorie" style="width: 50%; margin:auto;" value="<?=$categories['libelle'];?>"/>
    <div class="form-group text-center">
            <button type="submit" class="btn btn-primary my-2">Modifier la catégorie</button>
    </div>
</form>