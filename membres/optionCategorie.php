<?php require_once 'entete.php';
?>
<?php
if($_SESSION['idRole'] != 2){
    header('location:index.php');
}
try {
    $categories=recupCategorie();
} catch (Exception $e) {
    ?>
    <div class="alert alert-danger">Erreur lors de la récupération des catégories.</div>
    <?php
}
?>
<h1 class="text-center cSujet">Option des catégories</h1>

<?php

    foreach($categories as $categorie){
        ?>
        <li class="list-group-item" style="width: 50%; margin:auto;">
                <?=$categorie["libelle"];?>
                <span style="float:right">
                    <a href="modifierCategorie.php?id=<?=$categorie["idCategorie"];?>" class="btn btn-warning btn-sm">Modifier</a>
                    <a href="supprimerCategorie.php?id=<?=$categorie["idCategorie"];?>" class="btn btn-danger btn-sm">Supprimer</a>
                </span>
            </li>
                <?php
    }
    if(isset($_GET['success']) && $_GET['success'] == 1){
        ?>
        <div class="alert alert-success mt-3">La catégorie <?=$_GET['libelle'];?> a été ajoutée</div>
        <?php
    }else if(isset($_GET['success']) && $_GET['success'] == 0){
        ?>
        <div class="alert alert-danger">La catégorie n'a pas pu être ajoutée<br></div>
        <?php
    }
    ?>

<form method="post" action="../traitement/ajoutCategorie.php">
<div class="form-group my-2" style="width: 25%; margin:auto;">

<input type="text" class="form-control" name="libelle" id="libelle" placeholder="Saisissez la catégorie">
</div>

<div class="form-group text-center">
<button type="submit" class="btn btn-primary my-2">Ajouter une catégorie</button>
</div>
</form>
<?php

require_once 'pied.php';