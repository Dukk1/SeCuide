<?php
session_start();
include_once "../webconfig.html";
require_once "../DAO/PacienteDAO.php";

if (!isset($_SESSION['idUsuario'])) {
    header('location: loginuser.php');
  }

  $PacienteDAO = new PacienteDAO();

  $usuario = $PacienteDAO->PesquisarByID($_SESSION['idUsuario']);

  var_dump($usuario);
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Home Page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a name="nav-button" class="nav-link" href="view/CadastrarAluno.php">Editar Perfil</a>
                </li>
                <li class="nav-item">
                    <a name="nav-button" class="nav-link" href="view/CadastrarNucleoAtendimento.php">Enviar Prontuario</a>
                </li>
            </ul>
        </div>
    </nav>

    <form name="perfilForm" id="perfilForm" method="POST" action="../Controller/pacienteControl.php">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" value="<?php if(isset($usuario['nome'])) { echo $usuario['nome']; } else echo "";  ?>" required>

        <label for="pai">Nome do Pai:</label>
        <input type="text" id="pai" name="pai" value="<?php if(isset($usuario['pai'])) { echo $usuario['pai']; } else echo "";  ?>" required>

        <label for="mae">Nome da Mãe:</label>
        <input type="text" id="mae" name="mae" value="<?php if(isset($usuario['mae'])) { echo $usuario['mae']; } else echo "";  ?>" required>

        <label for="dt_nasc">Data de Nascimento:</label>
        <input type="date" id="dt_nasc" name="dt_nasc" value="<?php if(isset($usuario['dt_nasc'])) { echo $usuario['dt_nasc']; } else echo "";  ?>" required>

        <label for="raca">Raça:</label>
        <input type="text" id="raca" name="raca" value="<?php if(isset($usuario['raca'])) { echo $usuario['raca']; } else echo "";  ?>" required>

        <label for="address">Endereço:</label>
        <input type="text" id="address" name="address" value="<?php if(isset($usuario['endereco'])) { echo $usuario['endereco']; } else echo "";  ?>"required>

        <label for="RG">RG:</label>
        <input type="text" id="RG" name="RG" value="<?php if(isset($usuario['rg'])) { echo $usuario['rg']; } else echo "";  ?>" required>

        <label for="CPF">CPF:</label>
        <input type="text" id="CPF" name="CPF" value="<?php if(isset($usuario['cpf'])) { echo $usuario['cpf']; } else echo "";  ?>" required>

        <label for="Nacionalidade">Nacionalidade:</label>
        <input type="text" id="naci" name="naci" value="<?php if(isset($usuario['nacionalidade'])) { echo $usuario['nacionalidade']; } else echo "";  ?>" required>

        <label for="Naturalidade">Naturalidade:</label>
        <input type="text" id="natu" name="natu" value="<?php if(isset($usuario['naturalidade'])) { echo $usuario['naturalidade']; } else echo "";  ?>" required>

        <select name="sexo" value="<?php if(isset($usuario['sexo'])) { echo $usuario['sexo']; } else echo "";  ?>">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option>
        </select>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>