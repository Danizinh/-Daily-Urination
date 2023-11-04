<?php

require dirname(__DIR__, 3) . "/global/connection/conn.php";
require dirname(__DIR__, 3) . "/global/src/DAO/PacienteDAO.php";
$pdo = new Database();
$pacienteDAO = new PacienteDAO($pdo->getConnection());
if (isset($_GET['pacienteId']) && is_numeric($_GET['pacienteId'])) {
    $pacienteId = $_GET['pacienteId'];
    $chartData = $pacienteDAO->getChartData($pacienteId);
    header('Content-Type: application/json');
    echo json_encode($chartData);
} else {
    header('HTTP/1.1 400 Bad Request');
    echo json_encode(['error' => 'ID do paciente não fornecido ou inválido']);
}
