<?php
require_once '../modeles/modele.php';

if(isset($_POST['libelle']) && !empty($_POST['libelle'])){
         $libelle = $_POST['libelle'];
         try {
             ajoutCategorie($libelle);
                 header('location:../membres/optionCategorie.php?success=1&libelle='.$_POST["libelle"]);
         } catch (Exception $e) {
            header('location:../membres/optionCategorie.php?success=0');          
         }
        }