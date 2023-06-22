<?php
require_once "../DTO/PacienteDTO.php";
require_once "../DAO/PacienteDAO.php";

session_start();

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {;

    if (isset($_SESSION['idUsuario']) && isset($_POST['nome']) && isset($_POST['pai'])) {
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
        $result = $PacienteDAO->Gravar($PacienteDTO);

       
    } else {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/LoginUser.php';</script>";
    }
} else {
    echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/LoginUser.php';</script>";
}


?>