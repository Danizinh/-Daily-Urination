<?php

session_start();
require("../models/Usuario.php");
require("../../connection/conn.php");
require("../DAO/UsuarioDAO.php");

if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        new Database();
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $liquidos = $_POST['liquidos'];
        $categorização = $_POST['categorização'];
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $result = $usuarioDAO->updateUsuario($id, $name, $email, $liquidos, $categorização);
        if ($result) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['liquidos'] = $liquidos;
            $_SESSION['categorização'] = $categorização;
        }
        header("Location:../view/pulic/profile.php");
    }
}
exit();
