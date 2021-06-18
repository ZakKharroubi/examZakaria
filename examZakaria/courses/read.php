<?php

require_once "access/db.php";

function findAllCourses(){

    $pdo = getPdo();
    
    $requete = "SELECT * FROM courses";

    $resultat = $pdo->query($requete);

    $items = $resultat->fetchAll();
    
    return $items;
}