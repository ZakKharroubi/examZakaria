<?php


function createCourse($description):void{

    $pdo = getPdo();
    $requeteCreation = $pdo->prepare("INSERT INTO courses(description) VALUES(:description)");
    $requeteCreation->execute(['description' => $description]);
    header("Location: index.php");

}