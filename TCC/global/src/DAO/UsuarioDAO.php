<?php
class UsuarioDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarUsuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirUsuarios($usuario)
    {
        $sql = "INSERT INTO usuarios(id,name,email,phone,birthday,endereco,pais,estado,cidade,genero,senha_crypt)
        VALUE(:id,:name,:email,:phone,:birthday,:endereco,:pais,:estado,:cidade,:genero,::senha_crypt)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $usuario['id']);
        $stmt->bindValue(':name', $usuario['name']);
        $stmt->bindValue(':email', $usuario['email']);
        $stmt->bindValue(':birthday', $usuario['birthday']);
        $stmt->bindValue(':phone', $usuario['phone']);
        $stmt->bindValue(':endereco', $usuario['endereco']);
        $stmt->bindValue(':pais', $usuario['pais']);
        $stmt->bindValue(':estado', $usuario['estado']);
        $stmt->bindValue(':cidade', $usuario['cidade']);
        $stmt->bindValue(':genero', $usuario['genero']);
        $stmt->bindValue(':senha_crypt', $usuario['senha_crypt']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atualizarUsuarios($id, $name, $email, $phone, $birthday, $endereco, $pais, $estado, $cidade, $genero)
    {
        $sql = "UPDATE usuarios SET name = :name, email = :email WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindValue(':pais', $pais, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindValue(':genero', $genero, PDO::PARAM_STR);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao atualizar o usuario" . $e->getMessage();
        }
    }

    public function excluirUsuario($id)
    {
        $sql = "DELETE FROM usuarios WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }
    public function efetuarLogin($email, $senha_crypt)
    {
        $sql = "SELECT * FROM usuarios WHERE email =:email and senha_crypt =:senha_crypt";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':senha_crypt', $senha_crypt);
        if ($stmt->execute()) {

            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Usuario(
                    $user['id'],
                    $user['name'],
                    $user['email'],
                    $user['senha_crypt'],
                );
            } else {
                return "Usuário nao encontrado";
            }
        }
    }
    public function efetuarRegistro($name, $email, $senha_crypt)
    {
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        if ($stmt->execute()) {
            if ($stmt->rowCount() <= 0) {
                $sql = "INSERT INTO usuarios (name,email,senha_crypt)
                VALUES(:name,:email,:senha_crypt)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':senha_crypt', $senha_crypt);
                if ($stmt->execute()) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }
}
