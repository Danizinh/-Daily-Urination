<?php

$localhost = "localhost";
$host = "root";
$database = "information";
$pass = "";
$pdo;

try {
    $pdo = new PDO("mysql:dbname" . $dbname . ";host", $user, $pass);
} catch (PDOException $e) {
    $error = $e->getMessage();
    print_r($e);
}
