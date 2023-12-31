<?php
require_once "../DTO/UsuarioDTO.php";
require_once "../DAO/UsuarioDAO.php";
require_once "../DAO/PacienteDAO.php";
require_once "../DAO/FuncionarioDAO.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);

    if (isset($_POST["login"]) && isset($_POST["senha"])) {
        $UsuarioDTO = new UsuarioDTO();
        $UsuarioDTO->setLogin($login);
        $UsuarioDTO->setsenha($senha);

        //var_dump($UsuarioDTO);

        $UsuarioDAO = new UsuarioDAO();
        $login = $UsuarioDAO->FazerLogin($UsuarioDTO);

        if ($login != null) {

            session_start();
            $_SESSION['idUsuario'] = $login["idUsuario"];
            $_SESSION['idPerfil'] = $login["idPerfil"];

            if ($login["idPerfil"] == 3) {
                $PacienteDAO = new PacienteDAO();
                $result = $PacienteDAO->PesquisarByID($login["idUsuario"]);
            } else if ($login["idPerfil"] == 2) {
                $FuncionarioDAO = new FuncionarioDAO();
                $result = $FuncionarioDAO->PesquisarByID($login["idUsuario"]);
            }

            if ($result) {

                if ($login["idPerfil"] == 2) {
                    $_SESSION['idFuncionario'] =  $result["idFuncionario"];
                } else if ($login["idPerfil"] == 3) {
                    $_SESSION['idPaciente'] =  $result["idPaciente"];
                }


                echo "<script>alert('Login Realizado com Sucesso!!'); window.location.href = '../index.php';</script>";
                exit();
            } else {
                echo "<script>alert('Login Realizado com sucesso, crie seu perfil!!'); window.location.href = '../VIEW/perfil.php';</script>";
                exit();
            }

            // var_dump($login);

            // if ($login["idPerfil"] == 1) {  //is admin
            //     echo "<script>alert('Login Realizado com Sucesso!!'); window.location.href = '../view/admin.php';</script>";
            //     exit();
            // } 
            // else if ($login["idPerfil"] == 2) { //is medico
            //     echo "<script>alert('Login Realizado com Sucesso!!'); window.location.href = '../view/doctor.php';</script>";
            //     exit();

            // } else if ($login["idPerfil"] == 3) { //is paciente
            //     echo "<script>alert('Login Realizado com Sucesso!!'); window.location.href = '../view/consultas.php';</script>";
            //     exit();
            // }
        } else {
            echo "<script>alert('Login Invalido'); window.location.href = '../view/LoginUser.php';</script>";
            exit();
        }
    } else {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href = '../view/LoginUser.php';</script>";
        exit();
    }
}
