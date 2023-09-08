<?php
class Medico extends Usuario
{
    public $name;
    private $cmr;
    private $senha;

    public $idPaciente;



    public function __construct($name, $cmr, $senha, $idPaciente)
    {
        $this->name = $name;
        $this->cmr->$cmr;
        $this->senha->$senha;
        $this->idPaciente->$idPaciente;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getcmr()
    {
        return $this->cmr;
    }
    public function getidPaciente()
    {
        return $this->idPaciente;
    }
}
