<?php

function ajoutPost($sujet,$contenu,$idCategorie,$idUtilisateur){
    $sql = getBdd() -> prepare ("INSERT INTO posts (sujet, contenu, idCategorie, idUtilisateur, date_heure) VALUES (?,?,?,?,NOW())");
    $sql -> execute([$sujet,$contenu,$idCategorie,$idUtilisateur]);
}

function selectionnerPost($idPost){
    $requete = getBdd()->prepare("SELECT * FROM posts WHERE idPost = ? LIMIT 1");
    $requete->execute([$idPost]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function modifierPost($idPost){
    $requete = getBdd()->prepare("UPDATE posts SET contenu = ? WHERE idPost = ?");
    $requete->execute([$_POST["contenu"],$idPost]);
}

function selectionnerPosts($idPost){
    $requete = getBdd()-> prepare ("SELECT * FROM posts INNER JOIN  utilisateurs USING (idUtilisateur) where idPost = ?  ");
    $requete -> execute([$idPost]);
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function accueilPosts(){
    $requete = getBdd()->prepare("SELECT * FROM posts INNER JOIN categories USING(idCategorie) INNER JOIN utilisateurs USING(idUtilisateur) ORDER BY sujet ASC LIMIT 10");
    $requete->execute();
     return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function supprimerPostetReponses(){
    $requete = getBdd()->prepare("DELETE posts,reponses FROM posts INNER JOIN reponses WHERE posts.idPost = reponses.idPost and posts.idPost = ?");
    $requete->execute([$_POST["idPost"]]);
}

function supprimerPost(){
    $requete = getBdd()->prepare("DELETE FROM posts WHERE idPost = ?");
    $requete->execute([$_POST["idPost"]]);
}