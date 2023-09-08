<?php
class Login
{
    public $email;
    private $senha;

    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
}

class Usuario extends Login
{
    public $name;
    public $phone;

    function __construct($name, $phone)
    {
        $this->name = $name;
        $this->phone = $phone;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}

class Paciente
{
    private $CPF;
    public $idMedico;

    function __construct($CPF, $idMedico)
    {
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;
    }

    public function getCPF()
    {
        return $this->CPF;
    }
    public function getidMedico()
    {
        return $this->idMedico;
    }
}
class Miccao extends  Usuario
{
    public $normal;
    public $urgencia;
    public $desconfortavel;
    public $horário;
    public $data;
    public $volumeUrinado;

    function __construct($normal, $urgencia, $desconfortavel, $horário, $data, $volumeUrinado)
    {
        $this->normal = $normal;
        $this->urgencia = $urgencia;
        $this->desconfortavel = $desconfortavel;
        $this->horário = $horário;
        $this->data = $data;
        $this->volumeUrinado = $volumeUrinado;
    }

    public function getNormal()
    {
        return $this->normal;
    }
    public function getUrgencia()
    {
        return $this->urgencia;
    }
    public function getDesconfortavel()
    {
        return $this->desconfortavel;
    }
    public function getHorario()
    {
        return $this->horário;
    }
    public function getData()
    {
        return $this->data;
    }
    public function getvolumeUrinado()
    {
        return $this->volumeUrinado;
    }
}
