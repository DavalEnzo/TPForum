<?php
require_once '../modeles/modele.php';

if (isset($_GET["idPost"])&& !empty($_GET["idPost"])){
        $idPost = $_GET["idPost"];
    }
    
    else{
        header("location:../membres/index.php");
    }
    $reponses= afficherReponses();
  if(isset($_POST["idPost"])){
      if(count($reponses)>0){
      try{
    header("location:../membres/supprimerPost.php?success=1&idPost=".$idPost);
    supprimerPostetReponses();
    }

    catch(Exception $e){
    header("location:../membres/supprimerPost.php?success=0");
}
      }else{
        try{
            header("location:../membres/supprimerPost.php?success=1&idPost=".$idPost);
            supprimerPost();
            }
            catch(Exception $e){
                header("location:../membres/supprimerPost.php?success=0");
      }
    }
  }
