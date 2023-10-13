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
            if ($stmt->rowCount() > 0) {
                $paciente = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Paciente(
                    $paciente['aniversario'],
                    $paciente['tel'],
                    $paciente['endereco'],
                    $paciente['estado'],
                    $paciente['pais'],
                    $paciente['cidade'],
                    $paciente['genero'],
                    $paciente['CPF'],
                    $paciente['id_medico'],
                    $paciente['id_usuario'],
                );
            } else {
                return "no data";
            }
        }
    }

    public function inserirPacientes($paciente)
    {
        $sql = "INSERT INTO pacientes(aniversario,tel,endereco,estado,pais,cidade,genero,CPF,id_medico,id_usuario)
        VALUES (:aniversario,:tel,:endereco,:estado,:pais,:cidade,:genero,:CPF,:id_medico,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':aniversario', $paciente['aniversario']);
        $stmt->bindValue(':tel', $paciente['tel']);
        $stmt->bindValue(':endereco', $paciente['endereco']);
        $stmt->bindValue(':estado', $paciente['estado']);
        $stmt->bindValue(':pais', $paciente['pais']);
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

    public function atualizarPacientes($aniversario, $tel, $endereco, $estado, $pais, $cidade, $genero, $CPF, $id_medico, $id_usuario)
    {
        $sql = "UPDATE pacientes SET aniversario = :aniversario,tel = :tel, endereco = :endereco, estado =:estado, pais =:pais, cidade =:cidade, genero =:genero, CPF =:CPF,
        id_medico = :id_medico WHERE id_usuario =:id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':aniversario', $aniversario, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':pais', $pais, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindValue(':genero', $genero, PDO::PARAM_STR);
        $stmt->bindValue(':CPF', $CPF, PDO::PARAM_STR);
        $stmt->bindValue(':id_medico', $id_medico, PDO::PARAM_STR);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_STR);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao atualizar o usuario" . $e->getMessage();
        }
    }
    public function execluirPaciente($id_usuario)
    {
        $sql = "DELETE FROM pacientes WHERE id :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id_usuario);
        if ($stmt->execluir()) {
            return true;
        } else {
            return "Excluido com sucesso";
        }
    }
}
