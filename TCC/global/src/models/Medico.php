c
<?php
require("Usuario.php");
class Medico extends Usuario
{
    private $id;
    private $nameMedico;
    private $crm;
    public function __construct($id, $nameMedico, $crm)
    {
        $this->id = $id;
        $this->nameMedico = $nameMedico;
        $this->crm = $crm;
    }

    public static function __construct2(
        $id,
        $nameMedico,
        $crm,
        $name,
        $senha_crypt,
        $email
    ) {
        $instance = new self($id, $nameMedico, $crm);
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
    public function nameMedico()
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
}
