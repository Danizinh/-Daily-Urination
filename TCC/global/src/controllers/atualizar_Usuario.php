<?php
session_start();
require("../models/Usuario.php");
require("../DAO/UsuarioDAO.php");
require("../../connection/conn.php");

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new Database();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $result = $usuarioDAO->atualizarUsuarios($id, $name, $email, $phone);
        if ($result) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
        }
        header("Location:../view/public/profile.php");
    }
}
exit();
