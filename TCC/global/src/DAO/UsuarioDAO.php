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
    // public function updateUsuario($name, $last_name, $email, $phone, $profession, $address, $city, $country, $zip, $neighborhood, $bio)
    // {
    //     $sql = "UPDATE usuario SET name = :name, last_name= :last_name, email =:email, phone= :phone, profession = :profession, address =:address,city = :city,zip = :zip,neighborhood =:neighborhood";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->bindValue('name', $name);
    //     $stmt->bindValue('last_name', $last_name);
    //     $stmt->bindValue('email', $email);
    //     $stmt->bindValue('phone', $phone);
    //     $stmt->bindValue('profession', $profession);
    //     $stmt->bindValue('address', $address);
    //     $stmt->bindValue('city', $city);
    //     $stmt->bindValue('zip', $zip);
    //     $stmt->bindValue('country', $country);
    //     $stmt->bindValue('neighborhood', $neighborhood);
    //     $stmt->bindValue('bio', $bio);
    //     if ($stmt->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
