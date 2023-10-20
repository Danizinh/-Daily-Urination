<?php
session_start();
require "../models/Paciente.php";
require "../DAO/UsuarioDAO.php";
require "../DAO/PacienteDAO.php";
require("../../connection/conn.php");

if (isset($_POST['submit']) && (!empty($_POST['email']) && (!empty($_POST['senha_crypt'])))) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new Database();
        $email = $_POST['email'];
        $senha_crypt = md5($_POST['senha_crypt']);
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $user = $usuarioDAO->efetuarLogin($email, $senha_crypt);
        if ($user != "Usuário nao encontrado") {
            $pacienteDAO = new PacienteDAO($pdo->getConnection());
            $paciente = $pacienteDAO->buscarPaciente($user->getId());
            $_SESSION['name'] = $user->getName();
            $_SESSION['sobrenome'] = $user->getsobrenome();
            $_SESSION['id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['senha_crypt'] = $user->getPassword();
            if ($paciente != "no data") {
                if ($paciente->getAniversario() == '1900-01-01') {
                    $_SESSION['aniversario'] = null;
                } else {
                    $_SESSION['aniversario'] = $paciente->getAniversario();
                }
                $_SESSION['tel'] = $paciente->getTel();
                $_SESSION['CEP'] = $paciente->getCEP();
                $_SESSION['endereco'] = $paciente->getEndereco();
                $_SESSION['bairro'] = $paciente->getBairro();
                $_SESSION['estado'] = $paciente->getEstado();
                $_SESSION['cidade'] = $paciente->getCidade();
                $_SESSION['pais'] = $paciente->getPais();
                $_SESSION['genero'] = $paciente->getGenero();
                $_SESSION['CPF'] = $paciente->getCPF();
                $_SESSION['idMedico'] = $paciente->getidMedico();
                header("Location: ../view/public/system.php");
            }
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha_crypt']);
            header("Location: ../view/public/login.php?erro=1");
        }
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['senha_crypt']);
        header("Location: ../view/public/login.php?erro=2");
    }
} else {
    header("Location: ../view/public/login.php?erro=3");
}
die();
// declara uma varivel que recebe o retorno da funcao efetuar login
// retorno da instancia
