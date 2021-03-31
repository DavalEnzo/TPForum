<?php
require_once("entete.php");?>

<?php $categories=recupCategorie();?>
<?php
if(isset($_GET['success']) && $_GET['success'] == 1){
    ?>
    <div class="alert alert-success mt-3">Le formulaire a bien été enregistré</div>
    <?php
    header('refresh:3;../membres/index.php');
    ?>
    <?php 
}else if (isset($_GET['success']) && $_GET['success'] == 0){
    echo "Il y a une erreur";
    header('refresh:3;../membres/index.php');
}
?>

    <div class="container">
        <form method="post" action="../traitement/creerPost.php">
            <div class='form-group'>      
                <label for="sujet">Titre</label>
                <input type="text" class ="form-control" name="sujet" id="sujet" placeholder="Saisisser le titre de votre post">
            </div> 
            <div class="form-group">
                <label for="contenu">Sujet</label>
                <textarea class ="form-control" name="contenu" id="contenu" placeholder="Saisisser le contenu de votre post" rows="3"></textarea>
            </div>    
        

        <div class="form-group">
            <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie" class="form-control">
            <?php

                foreach($categories as $categorie){
            ?>
                <option value="<?=$categorie["idCategorie"];?>">
                    <?=$categorie["libelle"];?>
                </option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Ajouter le post</button>
        </div>
        </form>
    </div>
<?php
require_once("pied.php");
?>