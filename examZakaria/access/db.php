<?php


/**
 * 
 * Effectue la connexion avec la base de données
 * @return PDO 
 */

function getPdo():PDO{
    $pdo = new PDO("mysql:host=localhost;dbname=exam", 'exam', 'zakizako',[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
]);
return $pdo;
}

  


?>