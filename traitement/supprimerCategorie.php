<?php
require_once '../modeles/modele.php';

if(isset($_POST['idCategorie'])){
    $categorie= recupCategorie($idCategorie);
        try{
             header("location:../membres/supprimerCategorie.php?success=1&libelle=".$categorie['libelle']);
            supprimerCategorie();
           
           
        }catch(Exception $e){
            header("location:../membres/supprimerCategorie.php?success=0");
        }
        }else{

             header('location:index.php');

        }