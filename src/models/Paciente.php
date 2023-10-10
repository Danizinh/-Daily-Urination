<?php
require("../models/Usuario.php");
class Paciente extends Usuario
{
    private $aniversario;
    private $tel;
    private $endereco;
    private $estado;
    private $pais;
    private $cidade;
    private $genero;
    private $CPF;
    private $idMedico;
    private $id_usuario;

    function __construct($aniversario, $tel, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico, $id_usuario)
    {

        $this->aniversario = $aniversario;
        $this->tel = $tel;
        $this->endereco = $endereco;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->cidade = $cidade;
        $this->genero = $genero;
        $this->CPF = $CPF;
        $this->idMedico = $idMedico;
        $this->id_usuario = $id_usuario;
    }
    public static  function __construct1($name, $email, $senha_crypt, $aniversario, $tel, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico, $id_usuario)
    {
        $instance = new self($aniversario, $tel, $endereco, $estado, $pais, $cidade, $genero, $CPF, $idMedico, $id_usuario);

        $instance->$name = $name;
        $instance->$email = $email;
        $instance->$senha_crypt = $senha_crypt;
    }


    public function getid_usuario()
    {
        return $this->id_usuario;
    }
    public function setId($newid_usuario)
    {
        $this->id_usuario = $newid_usuario;
    }
    public function getAniversario()
    {
        return $this->aniversario;
    }
    public function setBirthday($newAniversario)
    {
        $this->aniversario = $newAniversario;
    }
    public function getTel()
    {
        return $this->tel;
    }
    public function setTel($newTel)
    {
        $this->tel = $newTel;
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
