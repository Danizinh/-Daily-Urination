<?php

require dirname(__DIR__, 3) . "/global/src/models/models.php";
require dirname(__DIR__, 3) . "/global/src/DAO/MiccaoDAO.php.";
require dirname(__DIR__, 3) . "/global/connection/conn.php";


$miccaoDAO = new MiccaoDAO($pdo);
$obj = $miccaoDAO->listarMiccao();
var_dump($result);
