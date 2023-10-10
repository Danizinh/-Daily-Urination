<?php
require("../models/Usuario.php");
class Medico extends Usuario
{
    private $cmr;
    public function __construct($cmr)
    {
        $this->cmr->$cmr;
    }

    public static function __construct2($cmr, $id, $name, $senha_crypt, $email)
    {
        $instance = new self($cmr);
        $instance->$id = $id;
        $instance->$name = $name;
        $instance->$email = $email;
        $instance->$senha_crypt = $senha_crypt;
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
