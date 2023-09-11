<?php

class Miccao extends Paciente
{
    private $normal;
    private $urgencia;
    private $desconfortavel;
    private $horário;
    private $data;
    private $volume_Urinado;

    function __construct($normal, $urgencia, $desconfortavel, $horário, $data, $volume_Urinado)
    {
        $this->normal = $normal;
        $this->urgencia = $urgencia;
        $this->desconfortavel = $desconfortavel;
        $this->horário = $horário;
        $this->data = $data;
        $this->volume_Urinado = $volume_Urinado;
    }
    public static function __construct3($normal, $urgencia, $desconfortavel, $horario, $data, $volume_Urinado, $name_Paciente, $id_usuario, $phone, $idade, $sexo, $idMedico, $CPF, $senha)
    {

        $instance = new self($normal, $urgencia, $desconfortavel, $horario, $data, $volume_Urinado);

        $instance->$name_Paciente = $name_Paciente;
        $instance->$id_usuario = $id_usuario;
        $instance->$phone = $phone;
        $instance->$sexo = $sexo;
        $instance->$idade = $idade;
        $instance->$idMedico = $idMedico;
        $instance->$CPF = $CPF;
        $instance->$senha = $senha;
    }


    public function getNormal()
    {
        return $this->normal;
    }
    public function setNormal($newNormal)
    {
        $this->normal = $newNormal;
    }
    public function getUrgencia()
    {
        return $this->urgencia;
    }
    public function setUrgencia($newUrgencia)
    {
        $this->urgencia = $newUrgencia;
    }
    public function getDesconfortavel()
    {
        return $this->desconfortavel;
    }
    public function setDesconfortavel($newDesconfortavel)
    {
        $this->desconfortavel = $newDesconfortavel;
    }
    public function getHorario()
    {
        return $this->horário;
    }

    public function setHorario($newHorario)
    {
        $this->horário = $newHorario;
    }
    public function getData()
    {
        return $this->data;
    }

    public function setData($newData)
    {
        $this->data = $newData;
    }

    public function getvolumeUrinado()
    {
        return $this->volume_Urinado;
    }
    public function setvolumeUrinado($newvolumeUrinado)
    {
        $this->volume_Urinado = $newvolumeUrinado;
    }
}