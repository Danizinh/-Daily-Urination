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
        $birthday = $_POST['birthday'];
        $endereco = $_POST['endereco'];
        $pais = $_POST['pais'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $genero = $_POST['genero'];
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $result = $usuarioDAO->atualizarUsuarios($id, $name, $email, $phone, $birthday, $endereco, $pais, $estado, $cidade, $genero);
        if ($result) {
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['birthday'] = $birthday;
            $_SESSION['endereco'] = $endereco;
            $_SESSION['pais'] = $pais;
            $_SESSION['estado'] = $estado;
            $_SESSION['cidade'] = $cidade;
            $_SESSION['genero'] = $genero;
        }
        header("Location:../view/public/profile.php");
    }
}
exit();
