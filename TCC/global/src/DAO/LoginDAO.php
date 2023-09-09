<?php
class LoginDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function listarLogin()
    {
        $sql = "SELECT * FROM login_in";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirLogin($login)
    {
        $sql = "INSERT INTO pacientes(id,email,password,confirmation) VALUES(:id,:email,:password,:confirmation)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $login['id']);
        $stmt->bindParam(':email', $login['email']);
        $stmt->bindParam(':password', $login['password']);
        $stmt->bindParam(':confirmation', $login['confirmation']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }

    public function atualizarLogin($login)
    {
        $sql = "UPDATE login_in SET email = :email,password = :password,confirmation = :confirmation WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $login['id']);
        $stmt->bindParam(':email', $login['email']);
        $stmt->bindParam(':password', $login['password']);
        $stmt->bindParam(':confirmation', $login['confirmation']);
        return $stmt->execute();
    }
    public function deletarLogin($login)
    {
        $sql = "DELETE from login_in WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $login['id']);
        return $stmt->executar();
    }
}
