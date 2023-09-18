<?php
class Usuario
{
    private $id;
    private $name;
    private $email;
    private $categorização;
    private $episodios;
    private $liquidos;
    private $senha_crypt;

    function __construct($id, $name, $email, $categorização, $liquidos, $episodios, $senha_crypt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->categorização = $categorização;
        $this->episodios = $episodios;
        $this->liquidos = $liquidos;
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
    public function getSenha()
    {
        return $this->senha_crypt;
    }
    public function setSenha($newSenha)
    {
        $this->senha_crypt = $newSenha;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($newEmail)
    {
        $this->email = $newEmail;
    }
    public function getCategorização()
    {
        return $this->categorização;
    }
    public function setCategorização($newCategorização)
    {
        $this->categorização = $newCategorização;
    }
    public function getEpisodios()
    {
        return $this->episodios;
    }
    public function setEpisodios($newEpisodios)
    {
        $this->episodios = $newEpisodios;
    }
    public function getLiquidos()
    {
        return $this->liquidos;
    }
    public function setLiquidos($newLiquidos)
    {
        $this->liquidos = $newLiquidos;
    }
}
// $joao = new Usuario("marcio", "11993940869", "marciocaldasvieira@outlook.com", "1234");

// var_dump($joao);
