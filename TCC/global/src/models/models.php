<?php
class Usuario
{
    public $name_usuario;
    public $email;
    private $senha;
    private $confirmation;

    function __construct($name_usuario, $email, $senha, $confirmation)
    {
        $this->name_usuario = $name_usuario;
        $this->email = $email;
        $this->senha = $senha;
        $this->confirmation = $confirmation;
    }

    public function getName()
    {
        return $this->name_usuario;
    }
    public function setName($newNome)
    {
        $this->name_usuario = $newNome;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function setSenha($newSenha)
    {
        $this->senha = $newSenha;
    }
    public function getSenha_confirmation()
    {
        return $this->confirmation;
    }
    public function setSenha_confirmation($newSenha_confirmation)
    {
        $this->senha = $newSenha_confirmation;
    }
}
class Paciente extends Usuario
{
    public $name_paciente;
    public $idade;
    public $sexo;
    private $CPF;
    public $idMedico;

    function __construct($name_paciente, $idMedico, $idade, $sexo, $CPF)
    {

        $this->$name_paciente = $name_paciente;
        $this->$idade = $idade;
        $this->$sexo = $sexo;
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;
    }
    public static  function __construct1($name_usuario, $phone, $email, $senha, $confirmation, $name_paciente, $idade, $sexo, $CPF, $idMedico)
    {
        $instance = new self($name_paciente, $idade, $sexo, $CPF, $idMedico);

        $instance->$name_usuario = $name_usuario;
        $instance->$phone = $phone;
        $instance->$email = $email;
        $instance->$senha = $senha;
        $instance->$confirmation = $confirmation;
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
class Medico extends Usuario
{
    public $name_medico;
    private $cmr;
    public $idPaciente;



    public function __construct($name_medico, $cmr, $idPaciente)
    {
        $this->name_medico = $name_medico;
        $this->cmr->$cmr;
        $this->idPaciente->$idPaciente;
    }

    public static function __construct2($name_medico, $cmr, $idPaciente, $name_usuario, $phone, $senha, $confirmation, $email)
    {
        $instance = new self($name_medico, $cmr, $idPaciente);

        $instance->$name_usuario = $name_usuario;
        $instance->$phone =  $phone;
        $instance->$senha = $senha;
        $instance->$email = $email;
        $instance->$confirmation = $confirmation;
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

class Miccao extends Paciente
{
    public $normal;
    public $urgencia;
    public $desconfortavel;
    public $horário;
    public $data;
    public $volume_Urinado;

    function __construct($normal, $urgencia, $desconfortavel, $horário, $data, $volume_Urinado)
    {
        $this->normal = $normal;
        $this->urgencia = $urgencia;
        $this->desconfortavel = $desconfortavel;
        $this->horário = $horário;
        $this->data = $data;
        $this->volume_Urinado = $volume_Urinado;
    }
    public static function __construct3($normal, $urgencia, $desconfortavel, $horario, $data, $volume_Urinado, $name_Paciente, $id_usuario, $phone, $idade, $sexo, $idMedico, $CPF, $senha, $confirmation)
    {

        $instance = new self($normal, $urgencia, $desconfortavel, $horario, $data, $volume_Urinado);

        $instance->$name_Paciente = $name_Paciente;
        $instance->$id_usuario = $id_usuario;
        $instance->$phone = $phone;
        $instance->$idade = $idade;
        $instance->$idMedico = $idMedico;
        $instance->$CPF = $CPF;
        $instance->$senha = $senha;
        $instance->$confirmation = $confirmation;
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

// $joao = new Usuario("marcio", "11993940869", "marciocaldasvieira@outlook.com", "1234");

// var_dump($joao);
