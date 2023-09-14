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
        $stmt->bindValue(":id", $miccao['id']);
        $stmt->bindValue(":normal", $miccao['normal']);
        $stmt->bindValue(":urgencia", $miccao['urgencia']);
        $stmt->bindValue(":desconfortavel", $miccao['desconfortavel']);
        $stmt->bindValue(":horario", $miccao['horario']);
        $stmt->bindValue(":data", $miccao['data']);
        $stmt->bindValue(":volumeUrinado", $miccao['volumeUrinado']);
        $stmt->bindValue(":id_paciente", $miccao['id_paciente']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }

    public function atualizarMiccao($miccao)
    {
        $sql = "UPDATE miccao SET normal = :normal, urgencia =:urgencia,desconfortavel =:desconfortavel,horario = :horario, data = :data, volumeUrinado= :volumeUrinado, id_paciente= :id_paciente WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $miccao['id']);
        $stmt->bindValue(":normal", $miccao['normal']);
        $stmt->bindValue(":urgencia", $miccao['urgencia']);
        $stmt->bindValue(":desconfortavel", $miccao['desconfortavel']);
        $stmt->bindValue(":horario", $miccao['horario']);
        $stmt->bindValue(":data", $miccao['data']);
        $stmt->bindValue(":volumeUrinado", $miccao['volumeUrinado']);
        $stmt->bindValue(":id_paciente", $miccao['id_paciente']);
    }

    public function excluirMiccao($miccao)
    {
        $sql = "DELETE miccao WHERE= id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $miccao['id']);
        $stmt->execute();
    }
}
