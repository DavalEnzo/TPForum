<?php require_once 'entete.php'
?>
<?php

if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    ?> <h1 class="text-center cSujet">Bonjour <?=$_SESSION['login'];?>, Bienvenue sur le forum !</h1>
    <?php
}

 $posts = accueilPosts();

 foreach($posts as $post) {
     ?>
  
 
 <div class="card opaque w-50 my-3 " style="margin:auto">
  <div class="row g-0" >
    <div class="col-md-2">
      <img src="<?=$post["imgProfile"]?>" style="max-width: 100%;">
      
      <?php
         if($post["idRole"] == 2){
        ?>
            <h5 class="card-subtitle mb-2 text-center my-2" style="color: red;"><?=$post['login'];?></h5>
      <?php
         }else if($post["idRole"] == 3){
        ?>
        <h5 class="card-subtitle mb-2 text-center my-2" style="color: blue;"><?=$post['login'];?></h5>
        <?php
            }else{
              ?>
              <h5 class="card-subtitle mb-2 text-center my-2"><?=$post['login'];?></h5>
              
              <?php
              }
        ?>
        
    </div>
    <div class="col-md-10">
    <div class="card-header">
                <p class="text-end">Posté le : <?=$post["date_heure"]?></p>
            </div>
      <div class="card-body">
        <a href="Posts.php?idPost=<?=$post["idPost"];?>" class="card-title h5" style="text-decoration: none; color:black"><?=$post['sujet'];?></a>

        

        <h6 class="card-subtitle mb-2 text-muted">Categorie : <?=$post['libelle'];?></h6>
        <a href="Posts.php?idPost=<?=$post["idPost"];?>" class="btn btn-success btn-sm">Répondre</a>
      </div>
    </div>
  </div>
</div>
 <?php   
}

?>