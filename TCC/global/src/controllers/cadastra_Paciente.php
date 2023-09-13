<?php

require "../models/models.php";
require "../DAO/PacienteDAO.php";
require "../../connection/conn.php";

$paciente = new Paciente($_POST['idade'], $_POST['sexo'], $_POST['CPF'], $_POST['idMedico']);
$pacienteDAO = new PacienteDAO($pdo);
$result = $pacienteDAO->inserirPacientes($paciente);
return $result;
