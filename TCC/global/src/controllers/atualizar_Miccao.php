<?php
session_start();
require_once("../DAO/MiccaoDAO.php");
require_once("../models/Miccao.php");
require_once("../../connection/conn.php");
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = new Database();
            $horario = date('Y/m/d h:i:s', time());
            $urgencia = $_POST['urgencia'];
            $volumeUrinado = $_POST['volumeUrinado'];
            $idPaciente = $_POST['idPaciente'];
            $miccao = new Miccao($urgencia, $horario, $volumeUrinado, $idPaciente);
            $miccaoDAO = new MiccaoDAO($pdo->getConnection());
            $result = $miccaoDAO->inserirMiccao($miccao);
            echo $result;
            if ($result) {
                $_SESSION['urgencia'] = $urgencia;
                $_SESSION['horario'] = $horario;
                $_SESSION['volumeUrinado'] = $volumeUrinado;
                $_SESSION['idPaciente'] = $idPaciente;
                header('Location:../view/public/analytics.php');
                exit();
            } else {
                echo "Erro ao atualizar miccao";
            }
        } catch (PDOException $e) {
            echo "Erro" . $e->getMessage();
        }
    }
}
