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
    public function buscarMedico($id)
    {
        $sql = "SELECT * FROM medico WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $medico = $stmt->fetch(PDO::FETCH_ASSOC);
                return new Medico(
                    $medico['id'],
                    $medico['nameMedico'],
                    $medico['cmr'],
                );
            } else {
                return "Not";
            }
        }
    }

    public function inserirMedico($id, $nameMedico, $crm)
    {
        $sql = "INSERT INTO medico(id,nameMedico,crm)
        VALUES (:id,:nameMedico,:crm,)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id['id']);
        $stmt->bindValue(':nameMedico', $nameMedico['nameMedico']);
        $stmt->bindValue(':crm', $crm['crm']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao inserir Medico" . $e->getMessage();
        }
    }
    public function atualizarMedico($medico)
    {
        $sql = "UPDATE medico SET nameMedico =:nameMedico,crm = :crm = WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $medico['id']);
        $stmt->bindValue(':nameMedico', $medico['nameMedico']);
        $stmt->bindValue(':crm', $medico['crm']);
        try {
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            return "Erro ao Atualizar medico" . $e->getMessage();
        }
    }
    public function excluirMedico($id)
    {
        $sql = "DELETE FROM medico WHERE id=:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
