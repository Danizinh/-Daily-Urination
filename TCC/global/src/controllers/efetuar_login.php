<?php
session_start();
require("../models/Usuario.php");
require("../DAO/UsuarioDAO.php");
require("../../connection/conn.php");

if (isset($_POST['submit']) && (!empty(($_POST['email'] && !empty($_POST['$senha_crypt']))))) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new Database();
        $email = $_POST['email'];
        $senha_crypt = md5($_POST['senha_crypt']);
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $user = $usuarioDAO->efetuarLogin($email, $senha_crypt);
        if ($user != "Usuário nao encontrado") {
            $_SESSION['id'] = $user->$id;
            $_SESSION['email'] = $user->$email;
            $_SESSION['senha_crypt'] = $user->$senha_crypt;
            header("Location:../view/public/system.php");
        } else {
            unset($_SESSION['$email']);
            unset($_SESSION['$senha_crypt']);
            header("Location: ../view/public/login.php?erro=1");
        }
    } else {
        unset($_SESSION['$email']);
        unset($_SESSION['$senha_crypt']);
        header("Location: ../view/public/login.php?erro=1");
    }
} else {
    header("Location: ../view/public/login.php?erro=1");
}
die();
// declara uma varivel que recebe o retorno da funcao efetuar login
// retorno da instancia
