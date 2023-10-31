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
        $sql = "INSERT INTO miccao(urgencia,horario,volumeUrinado,idPaciente)
        VALUES(:urgencia,:horario,:volumeUrinado,:idPaciente)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":urgencia", $miccao->getUrgencia());
        $stmt->bindValue(":horario", $miccao->getHorario());
        $stmt->bindValue(":volumeUrinado", $miccao->getvolumeUrinado());
        $stmt->bindValue(":idPaciente", $miccao->getidPaciente());
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inserir Miccao" . $e->getMessage();
        }
    }

    
    public function excluirMiccao($idPaciente)
    {
        $sql = "DELETE miccao WHERE= id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":id", $idPaciente);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}