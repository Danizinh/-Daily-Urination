<?php

class Medico extends Usuario
{
    private $name_medico;
    private $cmr;
    private $idPaciente;



    public function __construct($name_medico, $cmr, $idPaciente)
    {
        $this->name_medico = $name_medico;
        $this->cmr->$cmr;
        $this->idPaciente->$idPaciente;
    }

    public static function __construct2($name_medico, $cmr, $idPaciente, $name_usuario, $phone, $senha, $email)
    {
        $instance = new self($name_medico, $cmr, $idPaciente);

        $instance->$name_usuario = $name_usuario;
        $instance->$phone =  $phone;
        $instance->$senha = $senha;
        $instance->$email = $email;
    }

    public function getName_medico()
    {
        return $this->name_medico;
    }
    public function setName_medico($new_name_medico)
    {
        $this->name_medico = $new_name_medico;
    }
    public function getcmr()
    {
        return $this->cmr;
    }
    public function setcrm($new_cmr)
    {
        $this->cmr = $new_cmr;
    }
}
