<?php

require "../models/models.php";
require "../DAO/UsuarioDAO.php";
require "../../connection/conn.php";

$usuario = new Usuario($_POST['name_usuario'], $_POST['email'], $_POST['senha'], $_POST['confirmation']);
$usuarioDAO = new UsuarioDAO($pdo);
$result = $usuarioDAO->inserirUsuario($usuario);
return $result;
