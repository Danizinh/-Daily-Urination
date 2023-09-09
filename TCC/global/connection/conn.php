<?php

$localhost = "localhost";
$host = "root";
$database = "dados";
$pass = "mysql321";
$pdo;

try {
    $pdo = new PDO("mysql:dbname" . $dbname . ";host", $user, $pass);
} catch (PDOException $e) {
    $error = $e->getMessage();
    print_r($e);
}
