<?php
session_start();
function getBdd(){
    // Initialisation de la connexion à la base de données
    return new PDO('mysql:host=localhost;dbname=tpforum;charset=utf8', 'root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}

require_once "../modeles/categorie.php";
require_once "../modeles/utilisateurs.php";
require_once "../modeles/imgProfile.php";
require_once "../modeles/posts.php";
require_once "../modeles/reponses.php";