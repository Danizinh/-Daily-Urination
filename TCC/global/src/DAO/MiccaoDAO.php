<?php

class MiccaoDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarMiccao()
    {
        $sql = "SELECT * FROM miccao";
        $result = $this->pdo->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function inserirMiccao($miccao)
    {
        $sql = "INSERT INTO miccao(id,normal,urgencia,desconfortavel,horario,data,volumeUrinado,id_paciente)
        VALUES(:id,:normal,:urgencia,:desconfortavel,:horario,:data,:volumeUrinado,id_paciente)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $miccao['id']);
        $stmt->bindParam(":normal", $miccao['normal']);
        $stmt->bindParam(":urgente", $miccao['urgente']);
        $stmt->bindParam(":desconfortavel", $miccao['desconfortavel']);
        $stmt->bindParam(":horario", $miccao['horario']);
        $stmt->bindParam(":data", $miccao['data']);
        $stmt->bindParam(":volumeUrinado", $miccao['volumeUrinado']);
        $stmt->bindParam(":id_paciente", $miccao['id_paciente']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }

    public function atualizarMiccao($miccao)
    {
        $sql = "UPDATE miccao SET normal = :normal, urgente =:urgente,desconfortavel =:desconfortavel,horario = :horario, data = :data, volumeUrinado= :volumeUrinado, id_paciente= :id_paciente WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $miccao['id']);
        $stmt->bindParam(":normal", $miccao['normal']);
        $stmt->bindParam(":urgencia", $miccao['urgencia']);
        $stmt->bindParam(":desconfortavel", $miccao['desconfortavel']);
        $stmt->bindParam(":horario", $miccao['horario']);
        $stmt->bindParam(":data", $miccao['data']);
        $stmt->bindParam(":volumeUrinado", $miccao['volumeUrinado']);
        $stmt->bindParam(":id_paciente", $miccao['id_paciente']);
    }

    public function excluirMiccao($miccao)
    {
        $sql = "DELETE miccao WHERE= id=id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(":id", $miccao['id']);
        return $stmt->execute();
    }
}
