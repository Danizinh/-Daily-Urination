<?php
class Usuario
{
    private $id;
    private $name;
    private $email;
    private $senha_crypt;


    function __construct($id, $name, $email, $senha_crypt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->senha_crypt = $senha_crypt;
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
        return $this->name;
    }
    public function setName($newNome)
    {
        $this->name = $newNome;
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
