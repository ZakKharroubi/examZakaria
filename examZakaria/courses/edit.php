<?php


function editCourse($description, $id){

    $pdo = getPdo();

    $requeteEdition =$pdo->prepare("UPDATE courses SET description = :description WHERE id = :id");

    $requeteEdition->execute([
        "description" => $description,
        "id" => $id
    ]);
    header("Location: index.php");
// Il manque peut-être un return ici.
}