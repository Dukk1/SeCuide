<?php
require_once "../DTO/PacienteDTO.php";
require_once "../DAO/PacienteDAO.php";
require_once "../DTO/FuncionarioDTO.php";
require_once "../DAO/FuncionarioDAO.php";

session_start();

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {;

    if (isset($_SESSION['idUsuario']) && isset($_SESSION['idPerfil'])) {

        if (isset($_POST['nome']) && isset($_POST['pai'])) {


            if ($_SESSION['idPerfil'] == 3) {
                $PacienteDTO = new PacienteDTO();
                $PacienteDTO->setNome($_POST['nome']);
                $PacienteDTO->setPai($_POST['pai']);
                $PacienteDTO->setMae($_POST['mae']);
                $PacienteDTO->setDt_nasc($_POST['dt_nasc']);
                $PacienteDTO->setRaca($_POST['raca']);
                $PacienteDTO->setEndereco($_POST['address']);
                $PacienteDTO->setRg($_POST['RG']);
                $PacienteDTO->setCpf($_POST['CPF']);
                $PacienteDTO->setNacionalidade($_POST['naci']);
                $PacienteDTO->setNaturalidade($_POST['natu']);
                $PacienteDTO->setSexo($_POST['sexo']);
                $PacienteDTO->setIdUsuario($_SESSION['idUsuario']);

                //var_dump($UsuarioDTO);

                $PacienteDAO = new PacienteDAO();
                $result = $PacienteDAO->PesquisarByID($_SESSION['idUsuario']);

                if ($result) {
                    // Registro já existe, realizar atualização
                    $result = $PacienteDAO->Alterar($PacienteDTO);
                    echo "<script>alert('Dados Alterado com Sucesso!!'); window.location.href = '../VIEW/perfil.php';</script>";
                    exit();
                } else {
                    // Registro não existe, realizar gravação
                    $result = $PacienteDAO->Gravar($PacienteDTO);
                    echo "<script>alert('Dados Gravados com Sucesso!!'); window.location.href = '../VIEW/perfil.php';</script>";
                    exit();
                }

            } else if ($_SESSION['idPerfil'] == 2) {

                $FuncionarioDTO = new FuncionarioDTO();
                $FuncionarioDTO->setNome($_POST['nome']);
                $FuncionarioDTO->setPai($_POST['pai']);
                $FuncionarioDTO->setMae($_POST['mae']);
                $FuncionarioDTO->setDtnasc($_POST['dt_nasc']);
                $FuncionarioDTO->setRegistro($_POST['registro']);
                $FuncionarioDTO->setEndereco($_POST['address']);
                $FuncionarioDTO->setRg($_POST['RG']);
                $FuncionarioDTO->setCpf($_POST['CPF']);
                $FuncionarioDTO->setNacionalidade($_POST['naci']);
                $FuncionarioDTO->setNaturalidade($_POST['natu']);
                $FuncionarioDTO->setSexo($_POST['sexo']);
                $FuncionarioDTO->setIdEspecialidade($_POST['especialidade']);
                $FuncionarioDTO->setIdUsuario($_SESSION['idUsuario']);

                var_dump($FuncionarioDTO);

                $FuncionarioDAO = new FuncionarioDAO();

                $result = $FuncionarioDAO->PesquisarByID($_SESSION['idUsuario']);

                if ($result) {
                    // Registro já existe, realizar atualização
                    $result = $FuncionarioDAO->Alterar($FuncionarioDTO);
                    echo "<script>alert('Dados Alterado com Sucesso!!'); window.location.href = '../VIEW/perfil.php';</script>";
                    exit();
                } else {
                    // Registro não existe, realizar gravação
                    $result = $FuncionarioDAO->Gravar($FuncionarioDTO);
                    echo "<script>alert('Dados Gravados com Sucesso!!'); window.location.href = '../VIEW/perfil.php';</script>";
                    exit();
                }
            }
        } else {
            echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/perfil.php';</script>";
        }
    }
} else {
    echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/perfil.php';</script>";
}
