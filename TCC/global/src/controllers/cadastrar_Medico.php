require "../models/models.php";
require "../DAO/MedicoDAO.php";
require "../../connection/conn.php";


$medico = new Medico($_POST['cmr']);
$medicoDAO = new MedicoDAO($pdo);
$result = $medicoDAO->inserirMedico($medico);
return $result;


<?php
require "../DAO/MedicoDAO.php";


function cadastrar_paciente($id, $conexao)
{
    $MedicoDAO = new MedicoDAO($conexao);
    $result = $MedicoDAO->buscarMedico($id);
    return $result;
}
