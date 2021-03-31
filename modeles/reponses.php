<?php

function repondre($contenu,$idPost,$idUtilisateur){
    $sql = getBdd() -> prepare ("INSERT INTO reponses (contenu, idPost, idUtilisateur,date_heure) VALUES (?,?,?,NOW())");
    $sql -> execute([$contenu,$idPost,$idUtilisateur]);
}

function afficherReponses(){
    $requete = getBdd() -> prepare ('SELECT * FROM reponses INNER JOIN utilisateurs USING (idUtilisateur)  Where idPost = ? ORDER BY date_heure');
    $requete -> execute([$_GET['idPost']]);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function supprimerMessage(){
    $requete = getBdd()->prepare("DELETE FROM reponses WHERE idReponse = ? ");
    $requete->execute([$_POST["idReponse"]]);
}

function recupReponse($idreponse){
    $requete = getBdd()->prepare("SELECT * FROM reponses WHERE idReponse = ? LIMIT 1");
    $requete->execute([$idreponse]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function modifierReponse($idreponse){
    $requete = getBdd()->prepare("UPDATE reponses SET contenu = ? WHERE idReponse = ?");
    $requete->execute([$_POST["contenu"],$idreponse]);
}