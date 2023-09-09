<?php
class UsuarioDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarUsuario()
    {
        $sql = "SELECT * FROM usuario";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirUsuario($usuario)
    {
        $sql = "INSERT INTO usuario(id,name_usuario,phone,id_login)
        VALUE(:id,:name_usuario,:phone,:id_login)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $usuario['id']);
        $stmt->bindParam(':name_usuario', $usuario['name_usuario']);
        $stmt->bindParam(':phone', $usuario['phone']);
        $stmt->bindParam(':id_login', $usuario['id_login']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atualizarUsuario($usuario)
    {
        $sql = "UPDATE usuario SET name_usuario = :name_usuario,phone = :phone, id_login= :id_login WHERE id = id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':name_usuario', $usuario['name_usuario']);
        $stmt->bindParam(':phone', $usuario['phone']);
        $stmt->bindParam(':id_login', $usuario['id_login']);
        $stmt->bindParam(':id', $usuario['id']);
        return $stmt->execute();
    }

    public function excluirUsuario($id)
    {
        $sql = "DELETE FROM usuario WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
