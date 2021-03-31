<?php require_once 'entete.php'?>

<?php

if(isset($_GET['id']) && !empty($_GET['id'])){
        $idCategorie = $_GET['id'];
    }
    ?>
<?php


$posts= filtreCat($idCategorie);

?>
<div class="alert alert-info">
 <?php
    if(count($posts)<2){
        ?>
        Cette catégorie contient <?=count($posts);?> sujet.
        <?php
    }else{
        ?>
        Cette catégorie contient <?=count($posts);?> sujets.
        <?php
    }
?>

 </div>
 <div class="row my-4">
 <?php
 foreach ($posts as $post) {
     ?>
     <div class="card" style="width: 100rem; margin:auto">
   <div class="card-body">
     <a href="Posts.php?idPost=<?=$post["idPost"];?>" class="card-title h5" style="text-decoration: none; color:black"><?=$post['sujet'];?></a>
     <h5 class="card-subtitle mb-2 text-muted">Par : <?=$post['login'];?></h5>
     <h6 class="card-subtitle mb-2 text-muted">Catégorie : <?=$post['libelle'];?></h6>
     <a href="Posts.php?idPost=<?=$post["idPost"];?>" class="btn btn-success btn-sm">Répondre</a>
     <h7 class="card-subtitle mb-2 text-muted" style="margin-left:80% ;">Posté le <?=$post['date_heure'];?></h7>
   </div>
 </div>
 <?php   
}