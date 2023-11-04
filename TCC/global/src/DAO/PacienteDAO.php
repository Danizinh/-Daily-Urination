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
                    $paciente['id'],
                    $paciente['aniversario'],
                    $paciente['tel'],
                    $paciente['CEP'],
                    $paciente['endereco'],
                    $paciente['bairro'],
                    $paciente['cidade'],
                    $paciente['genero'],
                    $paciente['CPF'],
                    $paciente['UF'],
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
        $sql = "INSERT INTO pacientes(aniversario,tel,CEP,endereco,bairro,estado,cidade,pais,genero,CPF,id_medico,id_usuario)
        VALUES (:aniversario,:tel,:CEP,:endereco,:bairro,:estado,:cidade,:pais,:genero,:CPF,:id_medico,:id_usuario)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':aniversario', $paciente['aniversario']);
        $stmt->bindValue(':tel', $paciente['tel']);
        $stmt->bindValue(':CEP', $paciente['CEP']);
        $stmt->bindValue(':endereco', $paciente['endereco']);
        $stmt->bindValue(':bairro', $paciente['bairro']);
        $stmt->bindValue(':estado', $paciente['estado']);
        $stmt->bindValue(':cidade', $paciente['cidade']);
        $stmt->bindValue(':pais', $paciente['pais']);
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

    public function atualizarPacientes($aniversario, $tel, $CEP, $endereco, $bairro,  $cidade, $UF, $genero, $CPF, $id_medico, $id_usuario)
    {
        $sql = "UPDATE pacientes SET aniversario = :aniversario, tel = :tel,CEP =:CEP,endereco = :endereco,bairro =:bairro,
        cidade =:cidade,UF = :UF, genero =:genero, CPF =:CPF,id_medico = :id_medico WHERE id_usuario =:id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':aniversario', $aniversario, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':CEP', $CEP, PDO::PARAM_STR);
        $stmt->bindValue(':endereco', $endereco, PDO::PARAM_STR);
        $stmt->bindValue(':bairro', $bairro, PDO::PARAM_STR);
        $stmt->bindValue(':cidade', $cidade, PDO::PARAM_STR);
        $stmt->bindValue(':UF', $UF, PDO::PARAM_STR);
        $stmt->bindValue(':genero', $genero, PDO::PARAM_STR);
        $stmt->bindValue(':CPF', $CPF, PDO::PARAM_STR);
        $stmt->bindValue(':id_medico', $id_medico, PDO::PARAM_INT);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        try {
            if ($stmt->execute()) {
                return true;
            }
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

    public function buscarPacientes($idMedico)
    {
        $sql = "SELECT u.* , p.*  FROM pacientes as p INNER JOIN usuarios as u WHERE u.id = p.id_usuario and p.id_medico = :idMedico ORDER BY u.name";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':idMedico', $idMedico);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }
    }

    public function getChartData($pacienteId)
    {
        $stmt = $this->pdo->prepare("SELECT horario, volumeUrinado, tipo FROM Miccao WHERE idPaciente = :pacienteId ORDER BY horario ASC");
        $stmt->bindValue(':pacienteId', $pacienteId);
        if ($stmt->execute()) {
            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                $chartData = [
                    'miccao' => [],
                    'ingestao' => []
                ];

                foreach ($result as $row) {
                    $dataPoint = [
                        'x' => (date('Y-m-d h:i:s', strtotime($row['horario']))),
                        'y' => (int)$row['volumeUrinado']
                    ];

                    if ($row['tipo'] == 1) {
                        $chartData['miccao'][] = $dataPoint;
                    } elseif ($row['tipo'] == 2) {
                        $chartData['ingestao'][] = $dataPoint;
                    }
                }

                return $chartData;
            }
        }
        return null;
    }
}
