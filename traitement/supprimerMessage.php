<?php

require_once '../modeles/modele.php';
$idreponse = $_POST["idReponse"];
$reponses = recupReponse($idreponse);
if(isset($_POST["idReponse"])){
      try{
        header("location:../membres/supprimerMessage.php?success=1&id=".$idreponse."&idPost=".$reponses["idPost"]);
            supprimerMessage();

    }

    catch(Exception $e){
        header("location:../membres/supprimerMessage.php?success=0");
    }
  }