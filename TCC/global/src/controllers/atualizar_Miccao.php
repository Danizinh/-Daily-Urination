<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
require_once("../DAO/MiccaoDAO.php");
require_once("../models/Miccao.php");
require_once("../../connection/conn.php");
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = new Database();
            $horario = date('Y/m/d h:i:s PM', time());
            $urgencia = $_POST['urgencia'];
            $volumeUrinado = $_POST['volumeUrinado'];
            $idPaciente = $_POST['idPaciente'];
            $miccao = new Miccao($urgencia, $horario, $volumeUrinado, $idPaciente);
            $miccaoDAO = new MiccaoDAO($pdo->getConnection());
            $result = $miccaoDAO->inserirMiccao($miccao);
            header('Location:../view/public/analytics.php');
            exit();
        } catch (PDOException $e) {
            echo "Erro" . $e->getMessage();
        }
    }
}
