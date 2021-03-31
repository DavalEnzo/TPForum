<?php
require_once "entete.php";

if(isset($_SESSION['idRole']) && !empty ($_SESSION['idRole'])){
if($_SESSION['idRole'] == 2){
    ?> <h1 class="text-center cSujet">Bonjour <?=$_SESSION['login'];?>,votre statut d'administrateur vous rend puissant!</h1>
    <?php
}else{
    header("index.php");
}
}

 $utilisateurs = selectionUtilisateur();
?>
<div class="container text-center w-100 d-flex justify-content-center" >
    <?php
        foreach($utilisateurs as $utilisateur){
    ?>
    
       <ul class="list-group my-3  mx-3 w-25">
            <li class="list-group-item w-100% ">
            <h4>Pseudo : <?=$utilisateur['login']?></h4> <br> 
            <h4>idRole : <?=$utilisateur['idRole']?></h4>
                
            </li>
            <div class="text-center">
                    <a class= "btn btn-warning"href="modifierUtilisateur.php?id=<?=$utilisateur["idUtilisateur"]?>">Modifier</a>

                    <a class= "btn btn-danger" href="supprimerUtilisateur.php?id=<?=$utilisateur["idUtilisateur"]?>">Supprimer</a>
                </div>
        </ul>
  
    <?php
    }
    ?>
      </div>