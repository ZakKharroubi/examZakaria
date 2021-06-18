
<?php 

session_start();
if(isset($_POST['logOut'])){
   session_unset();
} 

require_once dirname(__FILE__)."/../access/db.php";
require_once "create.php";
require_once "read.php";
require_once "edit.php";
require_once "delete.php";
require_once "authentification/auth.php";


// on surveille ici POST ou GET, on vérifie les données et on appelle les function selon.
if($isLoggedIn && isset($_SESSION['userId'])){
$courses = findAllCourses($_SESSION['userId']);
}
// Supprimer course
if(!empty($_POST['idASupprimer']) && ctype_digit($_POST['idASupprimer'])){

    $idCourse = $_POST['idASupprimer'];

    deleteCourse($idCourse);
}

// Ajouter course

if(!empty($_POST['description']) && $_POST['description']!=""){

    $description = $_POST['description'];

    createCourse($description, $_SESSION['userId']);
}

// Editer course 

if(!empty($_POST['idAEditer']) && $_POST['idAEditer']!=""){
    if(!empty($_POST['descriptionEditee']) && $_POST['descriptionEditee']!=""){
    $idAediter = $_POST['idAEditer'];
    $descriptionEditee = $_POST['descriptionEditee'];
    editCourse($descriptionEditee, $idAediter);
    }
}

// Boolean Acheté/Pas encore acheté

if(isset($_POST['achete']) && $_POST['achete'] !=""){
    $pdo = getPdo();
    $courseId = $_POST['achete'];
    $requeteStatutItem = $pdo->prepare("UPDATE courses SET deja_achete = 0 WHERE id = :courseId");
    $requeteStatutItem->execute(["courseId" => $courseId]);
    header("Location: index.php");
}
if(isset($_POST['pasAchete']) && $_POST['pasAchete'] !=""){
    $pdo = getPdo();
    $courseId = $_POST['pasAchete'];
    $requeteStatutItem = $pdo->prepare("UPDATE courses SET deja_achete = 1 WHERE id = :courseId");
    $requeteStatutItem->execute(["courseId" => $courseId]);
    header("Location: index.php");
}


