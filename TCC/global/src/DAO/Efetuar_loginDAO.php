<?php

class LoginDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function efetuarLogin($email, $senha_crypt)
    {

        $sql = "SELECT * FROM usuario WHERE email =:email and senha =:senha";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha', $senha_crypt);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Usuario(
                    $user['id'],
                    $user['name_usuario'],
                    $user['email'],
                    $user['senha'],

                );
            } else {
                unset($_SESSION['name_usuario']);
                unset($_SESSION['senha']);
            }
        }
    }
}
