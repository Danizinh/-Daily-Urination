<?php
session_start();
require_once "../DAO/MedicoDAO.php";
require_once "../models/Medico.php";
require_once "../DAO/UsuarioDAO.php";
require_once "../models/Usuario.php";
require_once "../models/Paciente.php";
require_once "../DAO/PacienteDAO.php";
require_once "../../connection/conn.php";

if (isset($_POST['submit']) && (!empty($_POST['email']) && (!empty($_POST['senha_crypt'])))) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pdo = new Database();
        $email = $_POST['email'];
        $senha_crypt = md5($_POST['senha_crypt']);
        $usuarioDAO = new UsuarioDAO($pdo->getConnection());
        $user = $usuarioDAO->efetuarLogin($email, $senha_crypt);
        if ($user != "Usuário nao encontrado") {
            $medicoDAO = new MedicoDAO($pdo->getConnection());
            $medico = $medicoDAO->validacaoMedico($user->getId());
            if($medico){
                $_SESSION['id'] = $medico->getIdUsuario();
                $_SESSION['crm'] = $medico->getcrm();
                $_SESSION['nameMedico'] = $medico->getnameMedico();
                $_SESSION['idUsuario'] = $medico->getIdUsuario();
                header("Location: ../view/public/platform.php");
              
            } else {
                $pacienteDAO = new PacienteDAO($pdo->getConnection());
                $paciente = $pacienteDAO->buscarPaciente($user->getId());
                $_SESSION['name'] = $user->getName();
                $_SESSION['sobrenome'] = $user->getsobrenome();
                $_SESSION['id'] = $user->getId();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['senha_crypt'] = $user->getPassword();
                if ($paciente != "no data") {
                    $_SESSION['aniversario'] = ($paciente->getAniversario() == '1900-01-01') ? null : $paciente->getAniversario();
                    $_SESSION['idPaciente'] = $paciente->getIdPaciente();
                    $_SESSION['tel'] = $paciente->getTel();
                    $_SESSION['CEP'] = $paciente->getCEP();
                    $_SESSION['endereco'] = $paciente->getEndereco();
                    $_SESSION['bairro'] = $paciente->getBairro();
                    $_SESSION['estado'] = $paciente->getEstado();
                    $_SESSION['cidade'] = $paciente->getCidade();
                    $_SESSION['pais'] = $paciente->getPais();
                    $_SESSION['genero'] = $paciente->getGenero();
                    $_SESSION['CPF'] = $paciente->getCPF();
                    $_SESSION['idMedico'] = $paciente->getidMedico();
                    header("Location: ../view/public/system.php");
                }
            }
        } else {
            unset($_SESSION['email']);
            unset($_SESSION['senha_crypt']);

            header("Location: ../view/public/login.php?erro=2");
        }
    } else {
        header("Location: ../view/public/login.php?erro=3");
    }
    die();
}
// declara uma varivel que recebe o retorno da funcao efetuar login
// retorno da instancia