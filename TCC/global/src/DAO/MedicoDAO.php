<?php

class MedicoDAO
{
    private $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarMedico()
    {
        $sql = "SELECT * FROM medico";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirMedico($medico)
    {
        $sql = "INSERT INTO medico(id,name_medico,CRM,password_medico,id_paciente,id_usuario)
        VALUES (:id,:name_medico,:CRM,:id_paciente,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $medico['id']);
        $stmt->bindParam(':name_medico', $medico['name_medico']);
        $stmt->bindParam(':CRM', $medico['CRM']);
        $stmt->bindParam(':id_paciente', $medico['id_paciente']);
        $stmt->bindParam(':id_usuario', $medico['id_usuario']);

        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atulizarMedico($medico)
    {
        $sql = "UPDATE pacientes SET name_medico = :name_medico, CRM = :CRM,id_paciente = :id_paciente,id_usuario =:id_usuario WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $medico['id']);
        $stmt->bindParam(':name_medico', $medico['name_medico']);
        $stmt->bindParam(':CRM', $medico['CRM']);
        $stmt->bindParam(':id_paciente', $medico['id_paciente']);
        $stmt->bindParam(':id_usuario', $medico['id_usuario']);
        return $stmt->execute();
    }
    public function excluirMedico($id)
    {
        $sql = "DELETE FROM medico WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
