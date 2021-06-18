<?php


function deleteCourse($id){

    $pdo = getPdo();

    $requeteDelete = $pdo->prepare("DELETE FROM courses WHERE id = :id");
    $requeteDelete->execute(['id' => $id]);
    header("Location: index.php");

}