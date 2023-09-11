<?php
require("../models/Usuario.php");
require("../DAO/Efetuar_loginDAO.php");
require("../../connection/conn.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuarioDAO = new UsuarioDAO($pdo);
    $user = $usuarioDAO->efetuarLogin($email, $senha);
}
// declara uma varivel que recebe o retorno da funcao efetuar login
// retorno dq instancia
