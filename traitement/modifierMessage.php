<?php
require_once '../modeles/modele.php';
$idreponse = $_GET['id'];
if( isset($_POST["contenu"])&& !empty($_POST["contenu"])){
    try{
        modifierReponse($idreponse);
        header("location:../membres/modifierMessage.php?success=1&id=".$idreponse);
    }
    catch (Exception $e) { 
        //GESTION DES ERREURS
        header("location:../membres/modifierMessage.php?success=0");
    }
}
?>