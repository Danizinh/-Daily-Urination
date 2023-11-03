<?php
session_start();
require dirname(__DIR__, 3) . "/global/connection/conn.php";
require dirname(__DIR__, 3) . "/global/src/models/Reset.php";
require dirname(__DIR__, 3) . "/global/src/DAO/ResetDAO.php";

if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $pdo = new Database();
    $ResetDAO = new ResetDAO($pdo->getConnection());
    $result = $ResetDAO->emailCode($code);

    if ($result) {
        if (isset($_POST['senha_crypt'])) {
            $senha_crypt = $_POST['senha_crypt'];
            $senha_crypt = md5($senha_crypt);
            $email = $result['email'];
            if ($ResetDAO->atualizarSenha($email, $senha_crypt)) {
                if ($ResetDAO->excluirCode($code)) {
                    header('Location: ../view/public/login.php?erro=4');
                    exit();
                } else {
                    header('Location: ../view/public/login.php');
                    exit();
                }
            } else {
                header('Location: ../view/public/login.php?erro=2');
                exit();
            }
        }
    } else {
        header('Location: ../view/public/login.php');
        exit();
    }
}
