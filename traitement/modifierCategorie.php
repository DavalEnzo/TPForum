<?php
require_once '../modeles/modele.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
        $idCategorie = $_GET['id'];
    }
    
    if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
        try {
            majCategorie($idCategorie);
            header("location:../membres/modifierCategorie.php?success=1&libelle=".$_POST['libelle']."&id=".$idCategorie);
        } catch (Exception $e) {
            header("location:../membres/modifierCategorie.php?success=0");
        }
    }
