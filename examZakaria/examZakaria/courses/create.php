<?php


function createCourse($description, $userId):void{

    $pdo = getPdo();
    $requeteCreation = $pdo->prepare("INSERT INTO courses(description, user_id) VALUES(:description, :userId) ");
    $requeteCreation->execute(['description' => $description,
                                'userId' => $userId
]);
    header("Location: index.php");

}