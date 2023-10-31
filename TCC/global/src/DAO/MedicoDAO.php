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
   
    public function inserirMedico($nameMedico, $crm,$idUsuario)
    {
        $sql = "INSERT INTO medico(nameMedico,crm,idUsuario)
        VALUES (:nameMedico,:crm,:idUsuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':nameMedico', $nameMedico);
        $stmt->bindValue(':crm', $crm);
        $stmt->bindValue(':idUsuario', $idUsuario);
        if($stmt->execute()){
            $stmt = $this->pdo->query("SELECT LAST_INSERT_ID()");
            return $stmt->fetchColumn();
        }else{
            return false;
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
    public function validacaoMedico($idUsuario)
    {
        $sql = "SELECT * FROM medico WHERE idUsuario =:idUsuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idUsuario', $idUsuario);
        if ($stmt->execute()) {
          if($stmt->rowCount() > 0){
            $medico = $stmt->fetch(PDO::FETCH_ASSOC);
            return new Medico(
                $medico["id"],
                $medico["nameMedico"],
                $medico["crm"],
                $medico["idUsuario"]
            );
          }else{
            return false;
          }
        }
    }
    
}