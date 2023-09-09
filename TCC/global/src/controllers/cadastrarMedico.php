<?php
require "../models/models.php";
require "../DAO/MedicoDAO.php";

function cadastrarMedico($name_medico, $cmr, $idPaciente)
{
    $medico = new Medico($name_medico, $cmr, $idPaciente);

    $result = inserirMedico($medico);

    return $result;
}
