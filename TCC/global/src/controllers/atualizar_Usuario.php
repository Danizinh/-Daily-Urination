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
            $sobrenome = $_POST['sobrenome'];
            $email = $_POST['email'];
            $niverVazio = false;
            // Pacientes
            if ($_POST['aniversario'] != null) {
                $aniversario = $_POST['aniversario'];
            } else {
                $aniversario = '1900-01-01';
                $niverVazio = true;
            }
            $tel = $_POST['tel'];
            $CEP = $_POST['CEP'];
            $endereco = $_POST['endereco'];
            $bairro = $_POST['bairro'];
            $cidade = $_POST['cidade'];
            $UF = $_POST["UF"];
            $genero = $_POST['genero'];
            $CPF = $_POST['CPF'];
            $idMedico = $_POST['idMedico'];
            // Usuarios
            $usuarioDAO = new UsuarioDAO($pdo->getConnection());
            $resultUsuario = $usuarioDAO->atualizarUsuario($id, $name, $sobrenome, $email);

            // Pacientes
            $pacienteDAO = new PacienteDAO($pdo->getConnection());
            $resultPaciente = $pacienteDAO->atualizarPacientes(
                $aniversario,
                $tel,
                $CEP,
                $endereco,
                $bairro,
                $cidade,
                $UF,
                $genero,
                $CPF,
                $idMedico,
                $id,
            );
            echo $resultPaciente;
            if ($resultUsuario && $resultPaciente) {
                // Usuario
                $_SESSION['id'] = $id;
                $_SESSION['name'] = $name;
                $_SESSION['sobrenome'] = $sobrenome;
                $_SESSION['email'] = $email;
                // Paciente
                if ($niverVazio) {
                    $_SESSION['aniversario'] = null;
                } else {
                    $_SESSION['aniversario'] = $aniversario;
                }
                $_SESSION['tel'] = $tel;
                $_SESSION['CEP'] = $CEP;
                $_SESSION['endereco'] = $endereco;
                $_SESSION['bairro'] = $bairro;
                $_SESSION['cidade'] = $cidade;
                $_SESSION['UF'] = $UF;
                $_SESSION['genero'] = $genero;
                $_SESSION['CPF'] = $CPF;
                $_SESSION['idMedico'] = $idMedico;

                header("Location:../view/public/setting.php");
                exit();
            } else {
                echo "Erro ao atualizar os dados";
            }
        } catch (PDOException $e) {
            echo "Erro " . $e->getMessage();
        }
    }
}
