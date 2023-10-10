<?php

require "../models/models.php";
require "../DAO/MiccaoDAO.php.";
require "../../connection/conn.php";

$usuario = new Miccao($_POST['normal'], $_POST['urgencia'], $_POST['desconfortavel'], $_POST['horário'], $_POST['data'], $_POST['volume_Urinado']);
$miccaoDAO = new MiccaoDAO($pdo);
$result = $miccaoDAO->inserirMiccao($miccao);
return $result;
