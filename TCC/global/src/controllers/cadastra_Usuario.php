<?php
session_start();
require "../models/Usuario.php";
require "../DAO/UsuarioDAO.php";
require "../controllers/cadastrar_Paciente.php";
require "../../connection/conn.php";
if (isset($_POST['submit']) && (!empty($_POST['name']) && (!empty($_POST['email']) && (!empty($_POST['senha_crypt']))))) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new Database();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $senha_crypt = md5($_POST['senha_crypt']);
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $resultUsuario = $usuarioDAO->efetuarRegistro($name, $email, $senha_crypt);
        $paciente =  cadastrar_paciente($resultPaciente, $pdo->getConnection());
        if ($resulUsuario) {
            header("Location:../view/public/login.php");
        } else {
            header("Location:../view/public/cadastro.php?erro=4");
        }
    }
} else {
    header("Location:../view/public/cadastro.php?erro=4");
}
die();
