<?php

function recupCategorie(){

    $requete=getBdd()->prepare("SELECT * FROM categories");

    $requete->execute();

     return $requete->fetchAll(PDO::FETCH_ASSOC);

}

function majCategorie($idCategorie){
    $requete=getBdd()->prepare('UPDATE categories SET libelle = ? WHERE idCategorie = ?');
    $requete->execute([$_POST['libelle'], $idCategorie]);
}

function selectionCategorie($idCategorie){
    $requete=getBdd()->prepare('SELECT * FROM categories WHERE idCategorie = ? LIMIT 1');
    $requete->execute([$idCategorie]);
    return $requete->fetch(PDO::FETCH_ASSOC);
}

function ajoutCategorie($libelle){
    $requete = getBdd()->prepare("INSERT INTO categories (libelle) VALUES(?)");
    $requete->execute([$libelle]);
}

function filtreCat($idCategorie){
    $requete=getBdd()->prepare('SELECT * FROM categories INNER JOIN posts USING(idCategorie) INNER JOIN utilisateurs USING(idUtilisateur) WHERE idCategorie = ?');
    $requete->execute([$idCategorie]);  
    return $requete->fetchAll(PDO::FETCH_ASSOC);
}

function supprimerCategorie(){
    $requete=getBdd()->prepare('DELETE FROM categories WHERE idCategorie = ?');
    $requete->execute([$_POST['idCategorie']]);
}