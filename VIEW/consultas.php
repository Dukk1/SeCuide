<?php
session_start();
include_once "../webconfig.html";
require_once "../DAO/ConsultaDAO.php";
require_once "../DAO/AgendaDAO.php";
require_once "../DAO/PacienteDAO.php";
require_once "../DAO/EspecialidadeDAO.php";
require_once "../DAO/FuncionarioDAO.php";
require_once "../DAO/ProntuarioDAO.php";


if (!isset($_SESSION['idUsuario'])) {
    header('location: loginuser.php');
  }

  if ($_SESSION['idPerfil'] != 3) {
    header('location: ../index.php');
  } 

$ConsultasDAO = new ConsultaDAO();
$consultas = $ConsultasDAO->Pesquisar();

$PacienteDAO = new PacienteDAO();
$paciente = $PacienteDAO->PesquisarByID($_SESSION['idUsuario']);

$_SESSION['idPaciente'] = $paciente["idPaciente"];

$AgendaDAO = new AgendaDAO();
$agendas = $AgendaDAO->PesquisarByID($paciente["idPaciente"]);

$ProntuarioDAO = new ProntuarioDAO();
$prontuarios = $ProntuarioDAO->PesquisarByID($paciente["idPaciente"]);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Lista de Pacientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #f2f2f2;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .patient-info {
            max-height: 90px;
            overflow: hidden;
            transition: max-height 0.5s ease;
            /* Aumente o tempo da transição */
        }

        h3 {
            color: #333;
            font-size: 18px;
            margin: 0;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        p {
            color: #777;
            margin: 0;
        }

        p:first-child {
            margin-top: 10px;
        }

        .patient-info:hover {
            max-height: 300px;
            transition: max-height 0.5s ease;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Cor de fundo escurecido */
            display: none;
            /* Inicia oculto */
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
        }

        /* Estilos adicionais para personalização */
        .popup-btn {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }

        .popup-overlay form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .popup-overlay label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .popup-overlay input,
        .popup-overlay select {
            max-width: 250px;
            width: 250px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .popup-overlay .close-button {
            position: relative;
            top: 5px;
            left: 90%;
            width: 30px;
            height: 30px;
            padding: 0;

            background-color: #fff;
            color: #fff;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        .popup-overlay button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .close-icon {
            color: black;
        }

        .popup-overlay button:hover {
            background-color: #0056b3;
        }

        .popup-overlay .close-button:hover {
            background-color: #fff;
        }


        .popup-overlay h2 {
            font-size: 20px;
            text-align: center;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Manipulador de evento para mostrar mais detalhes ao passar o mouse por cima
            $('.patient-info').hover(function() {
                $(this).toggleClass('expanded');
            });
        });

        function openPopup(popupid) {
            var popup = document.getElementById(popupid);
            popup.style.display = "flex";
        }

        function closePopup(popupid) {
            var popup = document.getElementById(popupid);
            popup.style.display = "none";
        }
    </script>
</head>

<body>
    <h1>Suas Consultas</h1>

    <?php if ($agendas) { ?>
        <?php foreach ($agendas as $agenda) : ?>
            <li>
                <div class="patient-info">
                    <h3> Consulta: <?php echo $agenda['idAgenda']; ?></h3>
                    <p>  Data: <?php echo $agenda['data']; ?></p>
                    <p>  Hora: <?php echo $agenda['hora']; ?></p>

                    <br>
                    <button class="popup-btn" onclick="openPopup('popup2')">Ver Resposta</button>
                </div>
            </li>
        <?php endforeach; ?>
    <?php } else {
        echo "Voce não tem consultas.";
    } ?>


    <br>
    <button class="popup-btn" onclick="openPopup('popup')">Agendar uma Consulta!</button>

    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <h2>Marcar uma Consulta</h2>

            <button class="close-button" onclick="closePopup('popup')">
                <i class="fas fa-times close-icon"></i>
            </button>

            <form name="perfilForm" id="perfilForm" method="POST" action="../Controller/consultaControl.php">

                <label for="data">Data:</label>
                <input type="date" id="data" name="data" value="" required>

                <label for="hora">Hora:</label>
                <input type="time" id="hora" name="hora" value="" required>

                <label for="anamnese">Sintomas:</label>
                <input type="text" id="anamnese" name="anamnese" value="" required>


                <label for="especialidade">Especialidade:</label>
                <select name="especialidade">

                    <?php
                    $EspecialidadeDAO = new EspecialidadeDAO();
                    $especialidades = $EspecialidadeDAO->ObterEspecialidades();

                    //var_dump($especialidades);
                    foreach ($especialidades as $especialidade) {
                        echo "<option value='" . $especialidade['idEspecialidade'] . "'>" . $especialidade['especialidade'] . "</option>";
                    }
                    ?>

                </select><br>


                <label for="funcionario">Medico:</label>
                <select name="funcionario">
                    <?php
                    $FuncionarioDAO = new FuncionarioDAO();
                    $funcionarios = $FuncionarioDAO->Pesquisar();

                    // var_dump($funcionarios);
                    foreach ($funcionarios as $funcionario) {
                        echo "<option value='" . $funcionario['idFuncionario'] . "'> Dr. " . $funcionario['nome'] . "</option>";
                    }

                    ?>
                </select><br>

                <button type="submit">Marcar</button>

            </form>
        </div>
    </div>

    <!-- <ul>
        <?php foreach ($pacientes as $paciente) : ?>
            <li>
                <div class="patient-info">
                    <h3><?php echo $paciente['nome']; ?></h3>
                    <p>Sexo: <?php echo $paciente['sexo']; ?></p>
                    <p>Raça: <?php echo $paciente['raca']; ?></p>
                    <p>Data de Nascimento: <?php echo strftime('%d/%m/%Y', strtotime($paciente['dt_nasc'])); ?>
                    <p>Endereço: <?php echo $paciente['endereco']; ?></p>
                    <p>Pai: <?php echo $paciente['pai']; ?></p>
                    <p>Mae: <?php echo $paciente['mae']; ?></p>
                    <p>Nacionalidade: <?php echo $paciente['nacionalidade']; ?></p>
                    <p>Naturalidade: <?php echo $paciente['naturalidade']; ?></p>

                    <!-- Botão para abrir o Prontuario -->
    <br>
    <button class="popup-btn" onclick="openPopup()">Prontuario</button>
    </div>
    </li>

    <!-- Prontuario -->
    <div class="popup-overlay" id="popup">
        <div class="popup-content">
            <h2>Prontuario</h2>
            <p>Texto de exemplo.</p>
            <button onclick="closePopup()">Fechar</button>
        </div>
    </div>
<?php endforeach; ?>
</body>

</html>