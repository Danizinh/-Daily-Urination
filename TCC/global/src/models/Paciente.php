<?php
require("../models/Usuario.php");
class Paciente extends Usuario
{
    private $idade;
    private $sexo;
    private $CPF;
    private $idMedico;

    function __construct($idMedico, $idade, $sexo, $CPF)
    {

        $this->$idade = $idade;
        $this->$sexo = $sexo;
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;
    }
    public static  function __construct1($name, $email, $senha_crypt, $idade, $sexo, $CPF, $idMedico)
    {
        $instance = new self($idMedico, $idade, $sexo, $CPF);

        $instance->$name = $name;
        $instance->$email = $email;
        $instance->$senha_crypt = $senha_crypt;
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
