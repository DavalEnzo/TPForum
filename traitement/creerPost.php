<?php
require_once '../modeles/modele.php';
if(isset($_POST["sujet"]) && !empty($_POST["sujet"])
    && isset($_POST["contenu"]) && !empty($_POST["contenu"])
    && isset($_POST["categorie"]) && !empty($_POST["categorie"])){
        $sujet = $_POST["sujet"];
        $contenu = $_POST["contenu"];
        $idCategorie = $_POST["categorie"];
        $idUtilisateur =  $_SESSION["idUtilisateur"];
    
    try{
            ajoutPost($sujet,$contenu,$idCategorie,$idUtilisateur);
        header("location:../membres/nouveauPost.php?success=1");
        }catch(Exception $e){
            header("location:../membres/nouveauPost.php?success=0");
        }  
} 