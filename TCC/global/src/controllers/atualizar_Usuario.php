<?php
session_start();
require("../models/Usuario.php");
require("../DAO/UsuarioDAO.php");
require("../DAO/PacienteDAO.php");
require("../../connection/conn.php");

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        try {
            $pdo = new Database();
            // Usuarios
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Pacientes
            $tel = $_POST['tel'];
            $aniversario = $_POST['aniversario'];
            $endereco = $_POST['endereco'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
            $cidade = $_POST['cidade'];
            $CPF = $_POST['CPF'];
            $idMedico = $_POST['$idMedico'];
            $genero = $_POST['genero'];
            // Usuarios
            $usuarioDAO = new UsuarioDAO($pdo->getConnection());
            $resultUsuario = $usuarioDAO->atualizarUsuarios($id, $name, $email);

            // Pacientes
            $pacienteDAO = new PacienteDAO($pdo->getConnection());
            $resultPaciente = $pacienteDAO->atualizarPacientes($tel, $aniversario, $endereco, $pais, $estado, $cidade, $genero, $CPF, $idMedico, $id);
            echo $resultPaciente;
            if ($resultUsuario &&  $resultPaciente) {
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['tel'] = $tel;
                $_SESSION['aniversario'] = $aniversario;
                $_SESSION['endereco'] = $endereco;
                $_SESSION['estado'] = $estado;
                $_SESSION['cidade'] = $cidade;
                $_SESSION['pais'] = $pais;
                $_SESSION['CPF'] = $CPF;
                $_SESSION['idMedico'] = $idMedico;
                $_SESSION['genero'] = $genero;
                header("Location:../view/public/profile.php");
                exit();
            } else {
                echo "Erro ao atualizar os dados";
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
}
