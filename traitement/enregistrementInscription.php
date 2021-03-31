<?php require_once '../modeles/modele.php'?>
<?php
if(isset($_FILES['image']) && !empty($_FILES['image'])){
$nom = $_FILES['image']['name'];
$dossier = "../image/";
$fichier = null;
$extension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
}
if(isset($_POST["envoi"]) && !empty($_POST["envoi"])
    && $_POST["envoi"] == 1){
        $erreurs = [];
        if(isset($_POST["login"]) && !empty($_POST["login"]) 
            && isset($_POST["mdp"]) && !empty($_POST["mdp"]) 

            ){
                $requete = verifUtilisateur();
                if(verifUtilisateur()->rowcount() > 0){
                    $erreurs[]= "Le nom d'utilisateur saisie existe déjà";
                }

            }else{
                
                  $erreurs[] = "au moins un champ n'a pas été saisi";

                
                }
                if(count($erreurs)===0){
                        //on envoie le formulaire
                        extract($_POST);
                       
                        try{
                            //on hash le mdp
                            $mdp = password_hash($mdp, PASSWORD_BCRYPT);
                            //insertion dans la base de donnée
                            $requete =creerUtilisateur($login,$mdp);
                            header("location:../membres/inscription.php?success=1&nom=".$login);
                            ?>
                            <?php
                        }catch(Exception $e){
                            //un problème s'est produit lors de l'insertion en bdd
                            header("location:../membres/inscription.php?success=0&erreurs=".$erreurs);
                        }
                        ?>
                    </div>
                    <?php
                    if(isset($_FILES['image']) && !empty($_FILES['image'])){
                        $fichier = $dossier . $nom . "-" ."user=" . $_POST['login'] . "." . $extension;
                        // TEST 1 : Vérifier si on peut récupérer les dimensions de l'image
                        if(getimagesize($_FILES['image']['tmp_name'])){

                            // TEST 2 : Vérifier si la taille de l'image ne dépasse pas 3 mégas
                            if($_FILES['image']['size']<= 3000000){

                                // TEST 3 : Vérifier le vrai type du ficher
                                if($_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/jpeg"){
                                    // TEST 4 : On enregistre le fichier et on test si ça a fonctionné
                                    if(move_uploaded_file($_FILES['image']['tmp_name'], $fichier)){
                                        
                                        $requete = ajouterImage($fichier);
                                    }else{
                                             echo "l'image n'a pas pu être enregistrée";
                                    }
                                }else{
                                    echo "Le fichier n'a pas le bon type";
                                }
                            }else{
                                echo "Le fichier pèse plus de 3M";
                            }               
                    }else{
                        echo "Le fichier n'est pas une image";
                    }
                    header("location:../membres/inscription.php?success=1&nom=".$login); 
                    }
                }else{
                    // on affiche les erreurs
                    ?>
                    <div class="alert alert-danger">
                        Erreur:
                        <?php
                        foreach($erreurs as $erreur){
                            ?>
                            <br><?= $erreur;?>
                            <p>redirection sur la page d'inscription dans 3 secondes</p></div><?php                                
                                header('refresh:3;inscription.php');
                                exit;
                                ?>
                            <?php
                            header("location:../membres/inscription.php?success=0&erreurs=".$erreurs);
                        }
                    }
                }
    ?>