<?php
include_once dirname(__DIR__, 3) . "/global/src/models/Usuario.php";
class Paciente extends Usuario
{
    private $id;
    private $aniversario;
    private $tel;
    private $CEP;
    private $endereco;
    private $bairro;
    private $cidade;
    private $genero;
    private $CPF;
    private $UF;
    private $idMedico;
    private $id_usuario;

    function __construct($id, $aniversario, $tel, $CEP, $endereco, $bairro, $cidade, $genero, $CPF,$UF,$idMedico, $id_usuario)
    {
        $this->id = $id;
        $this->aniversario = $aniversario;
        $this->tel = $tel;
        $this->CEP = $CEP;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->genero = $genero;
        $this->CPF = $CPF;
        $this->UF = $UF;
        $this->idMedico = $idMedico;
        $this->id_usuario = $id_usuario;
    }

    public static function __construct1(
        $id,
        $name,
        $sobrenome,
        $email,
        $senha_crypt,
        $aniversario,
        $tel,
        $CEP,
        $endereco,
        $bairro,
        $cidade,
        $genero,
        $CPF,
        $UF,
        $idMedico,
        $id_usuario
    )
    {
        $instance = new self($id, $aniversario, $tel, $CEP, $endereco, $bairro, $cidade, $genero, $CPF, $UF, $idMedico, $id_usuario);

        $instance->name = $name;
        $instance->sobrenome = $sobrenome;
        $instance->email = $email;
        $instance->senha_crypt = $senha_crypt;

        return $instance;
    }

    public function getIdPaciente()
    {
        return $this->id;
    }

    public function setIdPaciente($id)
    {
        $this->id = $id;
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

    public function getIdade()
    {
        $ano = idate("Y");
        return ($ano - $this->aniversario->format("Y"));
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
    public function getCEP()
    {
        return $this->CEP;
    }
    public function setCEP($newCEP)
    {
        $this->CEP = $newCEP;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }
    public function setEndereco($newEndereco)
    {
        $this->endereco = $newEndereco;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function setBairro($newBairro)
    {
        $this->bairro = $newBairro;
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

    public function getUF()
    {
        return $this->UF;
    }

    public function setUF($UF): void
    {
        $this->UF = $UF;
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
