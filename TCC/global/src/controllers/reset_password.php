<?php
session_start();
require('../../connection/conn.php');
require('../models/Reset.php');
require('../DAO/ResetDAO.php');

if (isset($_GET['code'])) {
    $code = $_GET['code'];
    $pdo = new Database();
    $ResetDAO = new ResetDAO($pdo->getConnection());
    $result = $ResetDAO->getEmailByCode($code);

    if ($result) {
        if (isset($_POST['senha_crypt'])) {
            $senha_crypt = $_POST['senha_crypt'];
            $senha_crypt = md5($senha_crypt);
            $email = $result['email'];
            if ($ResetDAO->updateUserPassword($email, $senha_crypt)) {
                if ($ResetDAO->deleteResetCode($code)) {
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
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../src/styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="../view/src/styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <title>Faça login</title>
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-header">
                <h1>Alteraçao de senha</h1>
            </div>
            <form class="card-form" action="" method="POST">
                <div class="form-item">
                    <input class="form-control" id="senha_crypt" type="password" name="senha_crypt" required
                        placeholder="****************">
                    <span>Confirme a Senha</span>
                    <input class="form-control" type="password" id="senha_crypt" name="senha_crypt" required
                        placeholder="****************">
                    <div class="button">

                        <button type="submit" name="submit">Update password</button>
                    </div>
            </form>
        </div>
    </div>
</body>

</html>
