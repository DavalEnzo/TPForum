<?php
require_once 'entete.php';

//sinon récupération depuis l'url
if (isset($_GET["id"])&& !empty($_GET["id"])){
    $idutilisateur = $_GET["id"];
    $utilisateurs = selectUtilisateurId($idutilisateur);
}
    //redirection à la page d'acceuil
    else{

        header("location:index.php");
    }
    
    if(isset($_GET["success"])&& $_GET['success'] == 1 ){
         header("refresh:2;../membres/gererUtilisateur.php");
        ?>
            
            <div class="alert alert-success">
            Le Rôle de <?=$_GET["login"];?> a bien été modifié.
            </div>
        <?php
        }else if(isset($_GET["success"])&& $_GET['success'] == 0 ){
            header("refresh:2;../membres/supprimerCategorie.php");
                  ?>
                    <div class="alert alert-danger">
                        Erreur de modification du rôle <br>
                    </div>
                    <?php
                    }else{
        ?>

<div class="container text-center">
    <h1 class="cSujet">Modification du rôle de <?=$utilisateurs["login"];?></h1>
    <div class=" my-5 d-flex justify-content-center">
        <form method="post" class="form-control" action="../traitement/modifierUtilisateur.php?id=<?=$idutilisateur?>">
            <div class="form-floating w-100">
            <select name="idRole" class="form-select" id="idRole" aria-label="Floating label select example">
                <option id="idRole" value="1">Utilisateur</option>  
                <option id="idRole" value="3">Modérateur</option>
                <option id="idRole" value="2">Administrateur</option> 
            </select>
            <label for="idRole" style="color: black;" >les rôles suivant sont disponible: </label>
        </div>
                <button type="submit" class="btn btn-primary my-3">Modifier le rôle</button>
        
        </form>
    </div>
</div>
<?php
        }