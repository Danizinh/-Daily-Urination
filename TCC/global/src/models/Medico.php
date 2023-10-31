<?php
require_once('Usuario.php');
class Medico extends Usuario
{
    private $id;
    private $nameMedico;
    private $crm;
    private $idUsuario;
    public function __construct($id, $nameMedico, $crm,$idUsuario)
    {
        $this->id = $id;
        $this->nameMedico = $nameMedico;
        $this->crm = $crm;
        $this->idUsuario = $idUsuario;
    }

    public static function __construct2(
        $id,
        $nameMedico,
        $crm,
        $idUsuario,
        $name,
        $senha_crypt,
        $email
    ) {
        $instance = new self($id, $nameMedico, $crm,$idUsuario);
        $instance->$id = $id;
        $instance->$name = $name;
        $instance->$email = $email;
        $instance->$senha_crypt = $senha_crypt;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
    }
    public function getnameMedico()
    {
        return $this->nameMedico;
    }
    public function setName($newnameMedico)
    {
        $this->nameMedico = $newnameMedico;
    }
    public function getcrm()
    {
        return $this->crm;
    }
    public function setcrm($newCrm)
    {
        $this->crm = $newCrm;
    }
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($newIdUsuario)
    {
        $this->idUsuario = $newIdUsuario;
    }
}