<?php

class Reset
{
    private $id;
    private $code;
    private $email;

    function __construct($id, $code, $email)
    {
        $this->id = $id;
        $this->code = $code;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($newId)
    {
        $this->email = $newId;
    }
    public function getcode()
    {
        return $this->code;
    }
    public function setCode($newCode)
    {
        $this->code = $newCode;
    }

    public function getToken()
    {
        return $this->email;
    }
    public function setToken($new_email)
    {
        $this->email = $new_email;
    }

}
