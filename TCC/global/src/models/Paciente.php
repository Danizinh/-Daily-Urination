<?php
require("../models/Usuario.php");
class Paciente extends Usuario
{
    private $birthday;
    private $phone;
    private $endereco;
    private $estado;
    private $pais;
    private $cidade;
    private $genero;
    private $CPF;
    private $idMedico;

    function __construct($birthday, $phone, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico)
    {

        $this->$birthday = $birthday;
        $this->$phone = $phone;
        $this->$endereco = $endereco;
        $this->$estado = $estado;
        $this->$pais = $pais;
        $this->$cidade = $cidade;
        $this->$genero = $genero;
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;
    }
    public static  function __construct1($name, $email, $senha_crypt, $birthday, $phone, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico)
    {
        $instance = new self($endereco, $birthday, $phone, $estado, $pais, $cidade, $genero, $CPF, $idMedico);

        $instance->$name = $name;
        $instance->$email = $email;
        $instance->$senha_crypt = $senha_crypt;
    }


    public function getBirthday()
    {
        return $this->birthday;
    }
    public function setBirthday($newBirthday)
    {
        $this->birthday = $newBirthday;
    }
    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($newPhone)
    {
        $this->phone = $newPhone;
    }

    public function getEnderco()
    {
        return $this->endereco;
    }
    public function setEndereco($newEndereco)
    {
        $this->endereco = $newEndereco;
    }

    public function getEstado()
    {
        return $this->estado;
    }
    public function setEstado($newEstado)
    {
        $this->estado = $newEstado;
    }

    public function getPais()
    {
        return $this->pais;
    }
    public function setPais($newPais)
    {
        $this->pais = $newPais;
    }

    public function getCidade()
    {
        return $this->cidade;
    }
    public function setCidade($newCidade)
    {
        $this->cidade = $newCidade;
    }

    public function getGenero()
    {
        return $this->genero;
    }
    public function setGenero($newGenero)
    {
        $this->genero = $newGenero;
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
    public function setidMedico($newidMedico)
    {
        $this->idMedico = $newidMedico;
    }
}
