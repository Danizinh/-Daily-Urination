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

    public function inserirPacientes($paciente)
    {
        $sql = "INSERT INTO pacientes(id,idade,sexo,CPF,id_medico,id_usuario)
            VALUES (:id,:idade,:sexo,:CPF,:id_medico,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $paciente['id']);
        $stmt->bindParam(':idade', $paciente['idade']);
        $stmt->bindParam(':sexo', $paciente['sexo']);
        $stmt->bindParam(':CPF', $paciente['CPF']);
        $stmt->bindParam(':id_medico', $paciente['id_medico']);
        $stmt->bindParam(':id_usuario', $paciente['id_usuario']);

        if ($stmt->execute()) {
            return "200 OK";
        }
    }

    public function atulizarPacientes($paciente)
    {
        $sql = "UPDATE pacientes SET name_paciente= :name_paciente,idade=:idade,sexo=:sexo,CPF=:CPF,id_medico=:id_medico id_usuario =:id_usuario WHERE id =:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $paciente['id']);
        $stmt->bindParam(':name_paciente', $paciente['name_paciente']);
        $stmt->bindParam(':idade', $paciente['idade']);
        $stmt->bindParam(':sexo', $paciente['sexo']);
        $stmt->bindParam(':CPF', $paciente['CPF']);
        $stmt->bindParam(':id_medico', $paciente['id_medico']);
        $stmt->bindParam(':id_usuario', $paciente['id_usuario']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function execluirPaciente($id)
    {
        $sql = "DELETE FROM pacientes WHERE id :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        if ($stmt->execluir()) {
            return "200 OK";
        }
    }
}
