<?php
class UsuarioDAO
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarUsuario()
    {
        $sql = "SELECT * FROM usuarios";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirUsuario($usuario)
    {
        $sql = "INSERT INTO usuarios(id,name,email,senha_crypt)
        VALUE(:id,:name,:phone,:id_login)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $usuario['id']);
        $stmt->bindValue(':name', $usuario['name']);
        $stmt->bindValue(':email', $usuario['email']);
        $stmt->bindValue(':categorização', $usuario['categorização']);
        $stmt->bindValue(':senha_crypt', $usuario['senha_crypt']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atualizarUsuario($usuario)
    {
        $sql = "UPDATE usuarios SET id = :id name = :name, email= :email WHERE id = id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $usuario['id']);
        $stmt->bindValue(':name', $usuario['name']);
        $stmt->bindValue(':email', $usuario['email']);
        $stmt->bindValue(':categorização', $usuario['categorização']);
        $stmt->execute();
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
                    $user['episodios'],
                    $user['categorização'],
                    $user['liquidos'],
                    $user['senha_crypt'],
                );
            } else {
                return "Usuário nao encontrado";
            }
        }
    }
    public function efetuarRegistro($name, $email, $senha_crypt)
    {
        $sql = ("SELECT * FROM usuarios WHERE email = :email");
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
                }
            } else {
                return false;
            }
        }
    }
    public function updateUsuario($name, $email, $categorização, $episodios, $liquidos)
    {
        $sql = "UPDATE usuario SET name = :name email =:email episodios =:episodios categorização :categorização liquidos= :liquidos";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue('name', $name);
        $stmt->bindValue('email', $email);
        $stmt->bindValue('episodios', $episodios);
        $stmt->bindValue('categorização', $categorização);
        $stmt->bindValue('liquidos', $liquidos);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
