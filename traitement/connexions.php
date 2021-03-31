<?php
require_once '../modeles/modele.php';
if (isset($_POST["envoi"]) && !empty($_POST["envoi"]) && $_POST["envoi"] == 1) {
    extract($_POST);

    $erreurs = [];

    if (!isset($login) || empty($login) ||
        !isset($mdp) || empty($mdp)
    ) {
        $erreurs[] = "L'un des champs est vide";
    }

  
  
    
    if (count($erreurs) == 0) {
       $requete =  connexion($login);

        // Vérification si l'email n'existe pas en regardant le nombre de lignes retournées par la requête
        if ($requete->rowCount() > 0) {
            // l'email existe
            $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

            // Vérifier si les mots de passe ne correspondent pas
            if (!password_verify($mdp, $utilisateur["mdp"])) {
                // le mot de passe ne correspond pas
                $erreurs[] = "Le mot de passe saisi est incorrect";
            }
        } else {
            // l'email n'existe pas
            $erreurs[] = "Le nom d'utilisateurs n'existe pas";
        }
    }

    // Si après les vérification dans la bdd je n'ai toujours pas d'erreurs
    if (count($erreurs) == 0) {
        // on connecte l'utilisateur
        $_SESSION["login"] = $utilisateur["login"];
        $_SESSION["idRole"] = $utilisateur["idRole"];
        $_SESSION["idUtilisateur"] = $utilisateur["idUtilisateur"];
        $_SESSION["idCategorie"] = $utilisateur["idCategorie"];

        header("location:../membres/connexion.php?success=1&login=".$login);
    } else {
        // on affiche les erreurs
        header("location:../membres/connexion.php?success=0&erreurs=".$erreurs);
      
}

}