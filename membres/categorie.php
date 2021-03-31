<?php require_once "entete.php"?>

<?php

$categories=recupCategorie();

?>

<h1 class="text-center m-2">Catégories de posts</h1>
<h4 class="mx-4 my-3">Voici les catégories de posts, cela vous permet de trouver des posts en fonction des catégories qui vous intéressent.</h4>

<?php

foreach($categories as $categorie){
    ?>
            <a href="selectionCategorie.php?id=<?=$categorie['idCategorie'];?>" class="list-group-item" style="width: 15%; margin:auto;text-decoration:none; color:black">
                <?=$categorie["libelle"];?>
            </a>
            <?php
}