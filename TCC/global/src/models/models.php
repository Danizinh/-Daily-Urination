<?php
class Login
{
    public $email;
    private $senha;
    private $confirmation;

    public function __construct($email, $senha, $confirmation)
    {
        $this->email = $email;
        $this->senha = $senha;
        $this->confirmation = $confirmation;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function getSenha()
    {
        return $this->senha;
    }
    public function getConfirmation()
    {
        return $this->confirmation;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function setSenha($newSenha)
    {
        $this->senha = ($newSenha);
    }
    public function setConfirmation($newConfirmation)
    {
        $this->confirmation = $newConfirmation;
    }
}

class Usuario extends Login
{
    public $name_usuario;
    public $phone;

    function __construct($name_usuario, $phone, $email, $senha, $confirmation)
    {
        $this->name_usuario = $name_usuario;
        $this->phone = $phone;

        parent::__construct($email, $senha, $confirmation);
    }

    public function getName()
    {
        return $this->name_usuario;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($newPhone)
    {
        $this->phone = $newPhone;
    }
    public function setName($newName)
    {
        $this->name_usuario = $newName;
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
    public function getcmr()
    {
        return $this->cmr;
    }
    public function getId_Paciente()
    {
        return $this->idPaciente;
    }
    public function setName_medico($new_name_medico)
    {
        $this->name_medico = $new_name_medico;
    }
    public function setcmr($new_cmr)
    {
        $this->cmr = $new_cmr;
    }
    public function setIdPaciente($new_id_paciente)
    {
        $this->idPaciente = $new_id_paciente;
    }
}
class Paciente extends Usuario
{
    public $name_Paciente;
    public $idade;
    public $sexo;
    private $CPF;
    public $idMedico;

    function __construct($name_Paciente, $name_usuario, $phone, $senha, $confirmation, $email, $idMedico, $idade, $sexo, $CPF,)
    {

        $this->$name_Paciente = $name_Paciente;
        $this->$idade = $idade;
        $this->$sexo = $sexo;
        $this->$CPF = $CPF;
        $this->$idMedico = $idMedico;

        parent::__construct($name_usuario, $phone, $email, $senha, $confirmation);
    }

    public function getNome_Paciente()
    {
        return $this->name_Paciente;
    }
    public function getIdade()
    {
        return $this->idade;
    }
    public function getSexo()
    {
        return $this->sexo;
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

class Miccao extends Paciente
{
    public $normal;
    public $urgencia;
    public $desconfortavel;
    public $horário;
    public $data;
    public $volume_Urinado;

    function __construct($name_Paciente, $id_usuario, $phone, $idade, $sexo, $idMedico, $CPF, $normal, $urgencia, $desconfortavel, $horário, $data, $volume_Urinado, $senha, $confirmation)
    {
        $this->normal = $normal;
        $this->urgencia = $urgencia;
        $this->desconfortavel = $desconfortavel;
        $this->horário = $horário;
        $this->data = $data;
        $this->volume_Urinado = $volume_Urinado;

        parent::__construct($name_Paciente, $id_usuario, $phone, $idade, $sexo, $idMedico, $CPF, $senha, $confirmation, $idade,);
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
        return $this->volume_Urinado;
    }
}

// $joao = new Usuario("marcio", "11993940869", "marciocaldasvieira@outlook.com", "1234");

// var_dump($joao);
