<?php

require "../models/models.php";
require "../DAO/MiccaoDAO.php.";
require "../../connection/conn.php";

function listarMi()
{
}
$miccaoDAO = new MiccaoDAO($pdo);
$obj = $miccaoDAO->listarMiccao();
var_dump($result);
