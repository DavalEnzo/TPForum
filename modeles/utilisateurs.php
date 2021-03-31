<?php

function verifUtilisateur(){
    $requete = getBdd()->prepare("SELECT login FROM utilisateurs WHERE login = ?");
    $requete->execute([$_POST["login"]]);
    return $requete;
}

function creerUtilisateur($login, $mdp){
    $requete =getBdd()->prepare("INSERT INTO utilisateurs(login,mdp) VALUES(?,?)");
    $requete->execute([$login,$mdp]);
}

function ajouterImage($fichier){
    $requete = getBdd()->prepare('UPDATE utilisateurs SET imgProfile = ? WHERE idUtilisateur = (SELECT max(idUtilisateur)) ORDER BY idUtilisateur DESC LIMIT 1');
    $requete->execute([$fichier]);
}

function connexion($login){
    $requete = getBdd()->prepare("SELECT * FROM utilisateurs LEFT JOIN moderation USING(idUtilisateur) WHERE login = ?");
    $requete->execute([$login]);
    return $requete;
}

function selectionUtilisateur(){
    $requete = getBdd()->prepare("SELECT * FROM utilisateurs");
    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function modificationUtilisateur($idutilisateur){
    $requete = getBdd()->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ? LIMIT 1");
    $requete->execute([$idutilisateur]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function modifierRole($idutilisateur){
    $requete = getBdd()->prepare("UPDATE utilisateurs SET idRole = ? WHERE idUtilisateur = ?");
    $requete->execute([$_POST["idRole"],$idutilisateur]);
}

function supprimerUtilisateur(){
    $requete= getBdd()->prepare("DELETE FROM utilisateurs WHERE idUtilisateur = ? ");
    $requete->execute([$_POST["idUtilisateur"]]);
    return $requete;
}

function selectUtilisateurId($idutilisateur){
    $requete = getBdd()->prepare("SELECT * FROM utilisateurs WHERE idUtilisateur = ? ");
    $requete->execute([$idutilisateur]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}