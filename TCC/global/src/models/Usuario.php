<?php
class Usuario
{
    protected $idUsuario;
    protected $name;
    protected $sobrenome;
    protected $email;
    protected $senha_crypt;


    function __construct($id, $name, $sobrenome, $email, $senha_crypt)
    {
        $this->idUsuario = $id;
        $this->name = $name;
        $this->sobrenome = $sobrenome;
        $this->email = $email;
        $this->senha_crypt = $senha_crypt;
    }

    public function getId()
    {
        return $this->idUsuario;
    }
    public function setId($newId)
    {
        $this->idUsuario = $newId;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setName($newNome)
    {
        $this->name = $newNome;
    }
    public function getsobrenome()
    {
        return $this->sobrenome;
    }
    public function setsobrenome($newsobrenome)
    {
        $this->sobrenome = $newsobrenome;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function getPassword()
    {
        return $this->senha_crypt;
    }
    public function setPassword($newPassword)
    {
        $this->senha_crypt = $newPassword;
    }
}
// $joao = new Usuario("marcio", "11993940869", "marciocaldasvieira@outlook.com", "1234");

// var_dump($joao);
