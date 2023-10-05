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
        $pacienteDAO = new PacienteDAO($pdo->getConnection());
        $paciente = $pacienteDAO->buscarPaciente($user->getId());
        if ($user != "Usuário nao encontrado") {
            $_SESSION['name'] = $user->getName();
            $_SESSION['id'] = $user->getId();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['senha_crypt'] = $user->getSenha();
            if ($paciente != "no data") {
                $_SESSION['phone'] = $paciente->getPhone();
                $_SESSION['endereco'] = $paciente->getEnderco();
                $_SESSION['pais'] = $paciente->getPais();
                $_SESSION['estado'] = $paciente->getEstado();
                $_SESSION['cidade'] = $paciente->getCidade();
            }
            header("Location: ../view/public/system.php");
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
