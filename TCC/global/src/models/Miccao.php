<?php
require_once("../models/Paciente.php");
class Miccao extends Paciente
{
    private $urgencia;
    private $horario;
    private $volume_Urinado;
    private $idPaciente;

    function __construct($urgencia,  $horario, $volume_Urinado, $idPaciente)
    {
        
        $this->urgencia = $urgencia;
        $this->horario = $horario;
        $this->volume_Urinado = $volume_Urinado;
        $this->idPaciente = $idPaciente;
    }
    public static function __construct3(
        $normal,
        $urgencia,
        $desconfortavel,
        $horario,
        $data,
        $volume_Urinado,
        $idPaciente,
        $aniversario,
        $tel,
        $CEP,
        $endereco,
        $bairro,
        $cidade,
        $pais,
        $estado,
        $genero,
        $CPF,
        $idMedico,
        $id_usuario
    ) {

        $instance = new self($urgencia, $horario, $volume_Urinado, $idPaciente);

        $instance->$aniversario = $aniversario;
        $instance->$tel = $tel;
        $instance->$CEP = $CEP;
        $instance->$endereco = $endereco;
        $instance->$bairro = $bairro;
        $instance->$cidade = $cidade;
        $instance->$cidade = $cidade;
        $instance->$pais = $pais;
        $instance->$estado = $estado;
        $instance->$genero = $genero;
        $instance->$CPF = $CPF;
        $instance->$idMedico = $idMedico;
        $instance->$id_usuario = $id_usuario;
    }

  
    public function getUrgencia()
    {
        return $this->urgencia;
    }
    public function setUrgencia($newUrgencia)
    {
        $this->urgencia = $newUrgencia;
    }
        public function getHorario()
    {
        return $this->horario;
    }

    public function setHorario($newHorario)
    {
        $this->horario = $newHorario;
    }
    

    public function getvolumeUrinado()
    {
        return $this->volume_Urinado;
    }
    public function setvolumeUrinado($newvolumeUrinado)
    {
        $this->volume_Urinado = $newvolumeUrinado;
    }

    public function getidPaciente()
    {
        return $this->idPaciente;
    }
    public function setidPaciente($newidPaciente)
    {
        $this->idPaciente = $newidPaciente;
    }
}