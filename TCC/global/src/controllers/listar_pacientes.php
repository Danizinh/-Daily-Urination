<?php
function lista_paciente($idMedico)
{
    $pdo = new Database();
    $pacienteDAO = new PacienteDAO($pdo->getConnection());
    $result = $pacienteDAO->buscarPacientes($idMedico);
    $arrayPaciente = array();
    if($result){

        for ($i = 0; $i < count($result); $i++) {

            $pacientes = Paciente::__construct1(
                $result[$i]['id'],
                $result[$i]['name'],
                $result[$i]['sobrenome'],
                $result[$i]['email'],
                $result[$i]['senha_crypt'],
                $result[$i]['aniversario'],
                $result[$i]['tel'],
                $result[$i]['CEP'],
                $result[$i]['endereco'],
                $result[$i]['bairro'],
                $result[$i]['cidade'],
                $result[$i]['genero'],
                $result[$i]['CPF'],
                $result[$i]['UF'],
                $result[$i]['id_medico'],
                $result[$i]['id_usuario']
            );

            array_push($arrayPaciente, $pacientes);
        }

    }

    return $arrayPaciente;
}