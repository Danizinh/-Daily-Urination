<?php
session_start();
require("../models/Usuario.php");
require("../DAO/UsuarioDAO.php");
require("../DAO/PacienteDAO.php");
require("../../connection/conn.php");

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $pdo = new Database();
            // Usuarios
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            // Pacientes
            $aniversario = $_POST['aniversario'];
            $tel = $_POST['tel'];
            $endereco = $_POST['endereco'];
            $estado = $_POST['estado'];
            $pais = $_POST['pais'];
            $cidade = $_POST['cidade'];
            $genero = $_POST['genero'];
            $CPF = $_POST['CPF'];
            $idMedico = $_POST['idMedico'];
            // Usuarios
            $usuarioDAO = new UsuarioDAO($pdo->getConnection());
            $resultUsuario = $usuarioDAO->atualizarUsuarios($id, $name, $email);

            // Pacientes
            $pacienteDAO = new PacienteDAO($pdo->getConnection());
            $resultPaciente = $pacienteDAO->atualizarPacientes($aniversario, $tel, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico, $id);
            if ($resultUsuario && $resultPaciente) {
                // Usuario
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                // Paciente
                $_SESSION['aniversario'] = $aniversario;
                $_SESSION['tel'] = $tel;
                $_SESSION['endereco'] = $endereco;
                $_SESSION['estado'] = $estado;
                $_SESSION['pais'] = $pais;
                $_SESSION['cidade'] = $cidade;
                $_SESSION['genero'] = $genero;
                $_SESSION['CPF'] = $CPF;
                $_SESSION['idMedico'] = $idMedico;

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
