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
                    $paciente['phone'],
                    $paciente['birthday'],
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
        $sql = "INSERT INTO pacientes(id,phone,birthday,endereco,pais,estado,cidade,genero,CPF,id_medico,id_usuario)
            VALUES (:id,:phone,:birthday,:endereco,:id_medico,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $paciente['id']);
        $stmt->bindValue(':phone', $paciente['phone']);
        $stmt->bindValue(':birthday', $paciente['birthday']);
        $stmt->bindValue(':endereco', $paciente['endereco']);
        $stmt->bindValue(':pais', $paciente['pais']);
        $stmt->bindValue(':estado', $paciente['estado']);
        $stmt->bindValue(':cidade', $paciente['cidade']);
        $stmt->bindValue(':genero', $paciente['genero']);
        $stmt->bindValue(':CPF', $paciente['CPF']);
        $stmt->bindValue(':id_medico', $paciente['id_medico']);
        $stmt->bindValue(':id_usuario', $paciente['id_usuario']);

        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function atulizarPacientes($paciente)
    {
        $sql = "UPDATE pacientes SET =phone=:phone,birthday=:birthday,endereco=:endereco,pais=:pais estado =:estado,cidade=:cidade,genero=:genero, CPF=:CPF,id_Medico:=id_Medico,id_usuario=id_usuario WHERE id =:id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $paciente['id']);
        $stmt->bindValue(':phone', $paciente['phone']);
        $stmt->bindValue(':birthday', $paciente['birthday']);
        $stmt->bindValue(':endereco', $paciente['endereco']);
        $stmt->bindValue(':pais', $paciente['pais']);
        $stmt->bindValue(':estado', $paciente['estado']);
        $stmt->bindValue(':cidade', $paciente['cidade']);
        $stmt->bindValue(':genero', $paciente['genero']);
        $stmt->bindValue(':CPF', $paciente['CPF']);
        $stmt->bindValue(':id_medico', $paciente['id_medico']);
        $stmt->bindValue(':id_usuario', $paciente['id_usuario']);
        if ($stmt->execute()) {
            return "200 OK";
        }
    }
    public function execluirPaciente($id)
    {
        $sql = "DELETE FROM pacientes WHERE id :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        if ($stmt->execluir()) {
            return "200 OK";
        }
    }
}
