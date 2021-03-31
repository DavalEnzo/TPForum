<?php
require_once '../modeles/modele.php';

//vérification du formulaire
$idutilisateur = $_GET['id'];
$utilisateurs = selectUtilisateurId($idutilisateur);
if( isset($_POST["idRole"])&& !empty($_POST["idRole"])){
        try{
            modifierRole($idutilisateur);
            header("location:../membres/modifierUtilisateur.php?success=1&login=".$utilisateurs['login']."&id=".$idutilisateur);
        
        }
        catch (Exception $e) { 
            //GESTION DES ERREURS
            header("location:../membres/modifierUtilisateur.php?success=0");

        }
    }
    ?>