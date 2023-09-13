<?php
require("../models/Usuario.php");
class Medico extends Usuario
{
    private $cmr;
    public function __construct($cmr)
    {
        $this->cmr->$cmr;
    }

    public static function __construct2($cmr, $senha_crypt, $email)
    {
        $instance = new self($cmr);
        $instance->$senha_crypt = $senha_crypt;
        $instance->$email = $email;
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
