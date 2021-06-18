<?php

require_once "access/db.php";

function findAllCourses($userId){

    $pdo = getPdo();
    
    $requete = "SELECT * FROM courses WHERE user_id = :user_id";

    $resultat = $pdo->prepare($requete);

    $resultat->execute(['user_id'=> $userId]);

    $items = $resultat->fetchAll();
    
    return $items;
}