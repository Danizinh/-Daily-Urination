<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once dirname(__DIR__, 3) . "/global/src/DAO/MiccaoDAO.php";
require_once dirname(__DIR__, 3) . "/global/src/models/Miccao.php";
require_once dirname(__DIR__, 3) . "/global/src/models/Usuario.php";
require_once dirname(__DIR__, 3) . "/global/src/models/Paciente.php";
require_once dirname(__DIR__, 3) . "/global/connection/conn.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {

            $pdo = new Database();
            $horario = date('Y/m/d h:i:s', time());
            $urgencia = $_POST['urgencia'];
            $volumeUrinado = $_POST['volumeUrinado'];
            $idPaciente = $_POST['idPaciente'];
            $tipo = $_POST['tipo'];
            $miccao = new Miccao($urgencia, $horario, $volumeUrinado, $idPaciente,$tipo);
            $miccaoDAO = new MiccaoDAO($pdo->getConnection());
            $result = $miccaoDAO->inserirMiccao($miccao);
            header('Location:../view/public/analytics.php');
            exit();
        } catch (PDOException $e) {
            echo "entrou no catch";
            echo "Erro" . $e->getMessage();
        }
    }
}
