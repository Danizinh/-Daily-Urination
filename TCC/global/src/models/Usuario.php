<?php
class Usuario
{
    private $id;
    private $name_usuario;
    private $email;
    private $senha;

    function __construct($id, $name_usuario, $email, $senha)
    {
        $this->id = $id;
        $this->name_usuario = $name_usuario;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->id = $newId;
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

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
}
// $joao = new Usuario("marcio", "11993940869", "marciocaldasvieira@outlook.com", "1234");

// var_dump($joao);
