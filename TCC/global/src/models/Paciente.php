<?php
require("../models/Usuario.php");
require("../models/Medico.php");
require("../models/Miccao.php.php");
class Paciente extends Usuario
{
    private $name_paciente;
    private $idade;
    private $sexo;
    private $CPF;
    private $idMedico;

    function __construct($name_paciente, $idMedico, $idade, $sexo, $CPF)
    {

        $this->$name_paciente = $name_paciente;
        $this->$idade = $idade;
        $this->$sexo = $sexo;
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;
    }
    public static  function __construct1($name_usuario, $phone, $email, $senha, $name_paciente, $idade, $sexo, $CPF, $idMedico)
    {
        $instance = new self($name_paciente, $idade, $sexo, $CPF, $idMedico);

        $instance->$name_usuario = $name_usuario;
        $instance->$phone = $phone;
        $instance->$email = $email;
        $instance->$senha = $senha;
    }

    public function getNome_Paciente()
    {
        return $this->name_paciente;
    }
    public function setNome_Paciente($new_nome_paciente)
    {
        $this->name_paciente = $new_nome_paciente;
    }
    public function getIdade()
    {
        return $this->idade;
    }

    public function setIdade($newIdade)
    {
        $this->idade = $newIdade;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($newSexo)
    {
        $this->sexo = $newSexo;
    }
    public function getCPF()
    {
        return $this->CPF;
    }
    public function setCPF($newCPF)
    {
        $this->CPF = $newCPF;
    }
    public function getidMedico()
    {
        return $this->idMedico;
    }
    public function setidMedico($new_id_Medico)
    {
        $this->CPF = $new_id_Medico;
    }
}
