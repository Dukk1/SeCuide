<?php
require_once "../DAO/ConsultaDAO.php";
require_once "../DAO/AgendaDAO.php";
require_once "../DAO/PacienteDAO.php";
require_once "../DAO/EspecialidadeDAO.php";
require_once "../DAO/FuncionarioDAO.php";
require_once "../DAO/ProntuarioDAO.php";
require_once "../DTO/ConsultaDTO.php";
require_once "../DTO/AgendaDTO.php";
require_once "../DTO/PacienteDTO.php";
require_once "../DTO/EspecialidadeDTO.php";
require_once "../DTO/FuncionarioDTO.php";
require_once "../DTO/ProntuarioDTO.php";

session_start();

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {;

    if (isset($_SESSION['idUsuario']) && isset($_SESSION['idPerfil'])) {

        if (isset($_POST['data']) && isset($_POST['hora'])) {


            $AgendaDTO = new AgendaDTO();
            $AgendaDTO->setData($_POST['data']);
            $AgendaDTO->setHora($_POST['hora']);
            $AgendaDTO->setIdEspecialidade($_POST['especialidade']);
            $AgendaDTO->setIdFuncionario($_POST['funcionario']);
            $AgendaDTO->setIdPaciente($_SESSION['idPaciente']);

            $AgendaDAO = new AgendaDAO();
            $result = $AgendaDAO->Gravar($AgendaDTO);

            if ($result) {
                $ProntuarioDTO = new ProntuarioDTO();
                $ProntuarioDTO->setHora($_POST['hora']);
                $ProntuarioDTO->setData($_POST['data']);
                $ProntuarioDTO->setIdFuncionario($_POST['funcionario']);
                $ProntuarioDTO->setIdPaciente($_SESSION['idPaciente']);
                $ProntuarioDTO->setAnamnese($_POST['anamnese']);

                $ProntuarioDAO = new ProntuarioDAO();
                $result = $ProntuarioDAO->Gravar($ProntuarioDTO);

                if ($result) {
                    echo "<script>alert('Consulta marcada com sucesso!!'); window.location.href = '../VIEW/consultas.php';</script>";
                   exit();
                } else {
                    echo "<script>alert('Falha ao marcar uma Consulta!!'); window.location.href = '../VIEW/consultas.php';</script>";
                   exit();
                }


                // $agenda = $AgendaDAO->PesquisarByID($_SESSION['idPaciente']);
                // var_dump($agenda);

                // $ConsultaDTO = new ConsultaDTO();
                // $ConsultaDTO->setIdAgenda($agenda->getIdAgenda());
                // $ConsultaDTO->setIdEspecialidade($agenda->getIdEspecialidade());
                // $ConsultaDTO->setIdFuncionario($agenda->getIdFuncionario());
                // $ConsultaDTO->setIdPaciente($agenda->getIdpaciente());

                // $ConsultaDAO = new ConsultaDAO();
                // $result = $ConsultaDAO->Gravar($ConsultaDTO);
            } else {
                // Registro não existe, realizar gravação
                $result = $FuncionarioDAO->Gravar($FuncionarioDTO);
                echo "<script>alert('Falha ao marcar uma Consulta!!'); window.location.href = '../VIEW/consultas.php';</script>";
                exit();
            }
        } else {
            echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/consultas.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/consultas.php';</script>";
}
