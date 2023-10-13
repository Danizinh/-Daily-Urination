<?php

class ResetDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT id FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    }

    public function insertResetCode($code, $email)
    {
        $sql = "INSERT INTO reset (code, email) VALUES (:code, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":code", $code, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return 'Erro' . $e->getMessage();
        }
    }


    public function getEmailByCode($code)
    {
        $sql = "SELECT email FROM reset WHERE code = :code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUserPassword($email, $senha_crypt)
    {
        $sql = "UPDATE usuarios SET senha_crypt = :senha_crypt WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":senha_crypt", $senha_crypt, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function deleteResetCode($code)
    {
        $sql = "DELETE FROM reset WHERE code = :code";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":code", $code, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>
