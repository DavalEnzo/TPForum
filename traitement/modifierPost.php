<?php

require_once '../modeles/modele.php';
$idPost = $_GET["id"];
$post = selectionnerPost($idPost);
if( isset($_POST["contenu"])&& !empty($_POST["contenu"])){
        try{
            
            modifierPost($idPost);
           header("location:../membres/modifierPost.php?success=1&idPost=".$idPost);
        
            header("refresh:5;index.php");}
        catch (Exception $e) { 
            //GESTION DES ERREURS
            header("location:../membres/modifierPost.php?success=0");

        }
    }
    ?>