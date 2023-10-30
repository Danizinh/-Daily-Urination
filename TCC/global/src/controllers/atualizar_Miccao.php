<?php
require("../DAO/MiccaoDAO.php");
require("../models/Miccao.php");
require("../../connection/conn.php");
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = new Database();
            $id = $_POST['id'];
            $normal = $_POST['normal'];
            $urgencia = $_POST['urgencia'];
            $desconfortavel = $_POST['desconfortavel'];
            $horario = $_POST['horario'];
            $data = $_POST['data'];
            $volumeUrinado = $_POST['volumeUrinado'];
            $id_paciente = $_POST['id_paciente'];
            $miccaoDAO = new MiccaoDAO($pdo->getConnection());
            if ($result) {
                $_SESSION['id'] = $id;
                $_SESSION['normal'] = $normal;
                $_SESSION['urgencia'] = $urgencia;
                $_SESSION['desconfortavel'] = $desconfortavel;
                $_SESSION['horario'] = $horario;
                $_SESSION['data'] = $data;
                $_SESSION['volumeUrinado'] = $volumeUrinado;
                $_SESSION['id_paciente'] = $id_paciente;
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

?>
