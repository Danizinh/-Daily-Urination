<?php

function lista_Medico()
{
    $pdo = new Database();
    $medicoDAO = new MedicoDAO($pdo->getConnection());
    $result = $medicoDAO->listarMedico();
    //return $result;
    $arrayMedico = array();
    for ($i = 0; $i < count($result); $i++) {
        // echo $result[$i]["id"];
        // echo $result[$i]["crm"];
        // echo $result[$i]["nameMedico"];

        $medico = new Medico($result[$i]["id"], $result[$i]["nameMedico"], $result[$i]["crm"],$result[$i]["idUsuario"]);
        array_push($arrayMedico, $medico);
    }
    return $arrayMedico;
}