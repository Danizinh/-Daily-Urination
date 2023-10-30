<?php
require "../DAO/MiccaoDAO.php.php";


function cadastrar_miccao($idPaciente, $conexao)
{
    $miccaoDAO = new MiccaoDAO($conexao);
    $result = $miccaoDAO->inicializarPaciente($idPaciente);
    return $result;
}
