<?php
require_once "../DTO/UsuarioDTO.php";
require_once "../DAO/UsuarioDAO.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $perfil = $_POST['perfil'];

    if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["login"]) && isset($_POST["senha"]) && isset($_POST["perfil"])) {
        $UsuarioDTO = new UsuarioDTO();
        $UsuarioDTO->setNome($nome);
        $UsuarioDTO->setEmail($email);
        $UsuarioDTO->setLogin($login);
        $UsuarioDTO->setsenha($senha);
        $UsuarioDTO->setIdPerfil($perfil);
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    $UsuarioDAO = new UsuarioDAO();

    $result = $UsuarioDAO->PesquisarUmRegistro($UsuarioDTO);

    if ($result) {
        echo "<script>alert('Já existe um usuário com esse login. Por favor, escolha outro.'); window.location.href = '../view/RegUser.php';</script>";
    } else {
        $result = $UsuarioDAO->Gravar($UsuarioDTO);

        if ($result) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = '../view/LoginUser.php';</script>";
        } else {
            echo "<script>alert('Ocorreu um erro ao realizar o cadastro.'); window.location.href = '../view/RegUser.php';</script>";
        }
    }
}
