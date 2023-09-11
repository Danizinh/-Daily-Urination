<?php

require "../models/Usuario.php.php";
require "../DAO/UsuarioDAO.php";
require "../../connection/conn.php";

$usuario = new Usuario($_POST['id'], $_POST['name_usuario'], $_POST['email'], $_POST['senha']);
$usuarioDAO = new UsuarioDAO($pdo);
$result = $usuarioDAO->inserirUsuario($usuario);
return $result;
