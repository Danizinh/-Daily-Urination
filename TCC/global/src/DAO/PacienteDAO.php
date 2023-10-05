<?php
class PacienteDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }


    public function listarPacientes()
    {
        $sql = "SELECT * FROM pacientes";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function buscarPaciente($id)
    {
        $sql = "SELECT * FROM pacientes WHERE id_usuario = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            if ($paciente = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return new Paciente(
                    $paciente['id'],
                    $paciente['tell'],
                    $paciente['aniversario'],
                    $paciente['endereco'],
                    $paciente['estado'],
                    $paciente['pais'],
                    $paciente['cidade'],
                    $paciente['genero'],
                    $paciente['CPF'],
                    $paciente['idMedico']
                );
            } else {
                return "no data";
            }
        }
    }

    public function inserirPacientes($paciente)
    {
        $sql = "INSERT INTO pacientes(id,tel,aniversario,endereco,pais,estado,cidade,genero,CPF,id_medico,id_usuario)
        VALUES (:id,:tel,:aniversario,:endereco,:pais,:estado,:cidade,:genero,:CPF,:id_medico,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $paciente['id']);
        $stmt->bindValue(':tel', $paciente['tel']);
        $stmt->bindValue(':aniversario', $paciente['aniversario']);
        $stmt->bindValue(':endereco', $paciente['endereco']);
        $stmt->bindValue(':pais', $paciente['pais']);
        $stmt->bindValue(':estado', $paciente['estado']);
        $stmt->bindValue(':cidade', $paciente['cidade']);
        $stmt->bindValue(':genero', $paciente['genero']);
        $stmt->bindValue(':CPF', $paciente['CPF']);
        $stmt->bindValue(':id_medico', $paciente['id_medico']);
        $stmt->bindValue(':id_usuario', $paciente['id_usuario']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inserir Paciente" . $e->getMessage();
        }
    }

    public function inicializarPaciente($id_usuario)
    {
        $sql = "INSERT INTO pacientes(id_usuario) VALUES (:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inicializar" . $e->getMessage();
        }
    }

    public function atualizarPacientes($tel, $aniversario, $endereco, $pais, $estado, $cidade, $genero, $CPF, $idMedico, $id_usuario)
    {
        $sql = "UPDATE pacientes SET tel = :tel, aniversario = :aniversario, endereco = :endereco, pais =:pais, estado =:estado, cidade =:cidade, genero =:genero, CPF =:CPF,
        id_medico = :id_Medico WHERE id_usuario =:id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':aniversario', $aniversario, PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindValue(':pais', $pais, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindValue(':genero', $genero, PDO::PARAM_STR);
        $stmt->bindValue(':CPF', $CPF, PDO::PARAM_STR);
        $stmt->bindValue(':id_Medico', $idMedico, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_STR);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao atualizar o usuario" . $e->getMessage();
        }
    }
    public function execluirPaciente($id)
    {
        $sql = "DELETE FROM pacientes WHERE id :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if ($stmt->execluir()) {
            return true;
        } else {
            return "Excluido com sucesso";
        }
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
}
