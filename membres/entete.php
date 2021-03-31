<?php
require_once "../modeles/modele.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Forum</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
                <a class="navbar-brand" href="">Forum</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="categorie.php">Filtre par catégories</a>
                </li>
                <?php
                if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
                    ?>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="nouveauPost.php">New Topic</a>
                </li>
                <?php
                }?>

                
            </ul>
                <div class="navbar-nav" style="margin-left:auto;">
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>            
                                <?php
                            if(isset($_SESSION['idRole']) && !empty($_SESSION['idRole'])){
                                if($_SESSION['idRole'] == 2){
                            ?>
                            <a class="btn btn-success" href="optionCategorie.php">Option des catégories</a>
                            <a class="btn btn-success mx-3" href="gererUtilisateur.php">Liste des utilisateurs</a>
                            <?php
                                }
                            }
                    ?>
                    </li>
                </div>
            </div>
    </div>
</nav>
