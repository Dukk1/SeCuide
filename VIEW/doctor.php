<?php
session_start();
include_once "../webconfig.html";
require_once "../DAO/PacienteDAO.php";
require_once "../DAO/ConsultaDAO.php";
require_once "../DAO/AgendaDAO.php";
require_once "../DAO/EspecialidadeDAO.php";
require_once "../DAO/FuncionarioDAO.php";
require_once "../DAO/ProntuarioDAO.php";

// if (!isset($_SESSION['idUsuario'])) {
//     header('location: loginuser.php');
//   }

$PacienteDAO = new PacienteDAO();
$pacientes = $PacienteDAO->ObterPacientes();

$AgendaDAO = new AgendaDAO();
$agendas = $AgendaDAO->PesquisarByIDFuncionario($_SESSION['idFuncionario']);

var_dump($_SESSION);
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

        .popup-overlay input,
        .popup-overlay select, 
        .popup-overlay textarea{
            max-width: 350px;
            width: 350px;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
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

        function openPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "flex";
        }

        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }
    </script>
</head>

<body>
    <h1>Lista de Pacientes</h1>

    <ul>
        <?php foreach ($agendas as $agenda) : ?>
            <li>
                <div class="patient-info">

                    <?php
                    $PacienteDAO = new PacienteDAO();
                    $paciente_agenda = $PacienteDAO->PesquisarByIDPaciente($agenda['idPaciente']);
                    ?>


                    <h3><?php echo $paciente_agenda['nome']; ?></h3>
                    <p>Sexo: <?php echo $paciente_agenda['sexo']; ?></p>
                    <p>Raça: <?php echo $paciente_agenda['raca']; ?></p>
                    <p>Data de Nascimento: <?php echo strftime('%d/%m/%Y', strtotime($paciente_agenda['dt_nasc'])); ?>
                    <p>Endereço: <?php echo $paciente_agenda['endereco']; ?></p>
                    <p>Pai: <?php echo $paciente_agenda['pai']; ?></p>
                    <p>Mae: <?php echo $paciente_agenda['mae']; ?></p>
                    <p>Nacionalidade: <?php echo $paciente_agenda['nacionalidade']; ?></p>
                    <p>Naturalidade: <?php echo $paciente_agenda['naturalidade']; ?></p>

                    <!-- Botão para abrir o Prontuario -->
                    <br>
                    <button class="popup-btn" onclick="openPopup()">Prontuario</button>
                </div>
            </li>

            <!-- Prontuario -->
            <div class="popup-overlay" id="popup">
                <div class="popup-content">
                    <h2>Prontuario</h2>
                    <button class="close-button" onclick="closePopup('popup')">
                        <i class="fas fa-times close-icon"></i>
                    </button>

                    <?php
                    $ProntuarioDAO = new ProntuarioDAO();
                    $prontuario = $ProntuarioDAO->PesquisarByAgendaID($agenda['idAgenda']);
                    ?>

                    <p> Data: <?php echo $agenda['data']; ?></p>
                    <p> Hora: <?php echo $agenda['hora']; ?></p>
                    <h3> Sintomas: <?php echo $prontuario['anamnese']; ?></h3>

                    <br>
                    <textarea name="resposta" rows="4" cols="40" placeholder="Digite sua mensagem"></textarea>
                    <button class="popup-btn" onclick="openPopup()">Enviar Resposta</button>
                </div>
            </div>
        <?php endforeach; ?>
        <!-- <li>
            <div class="patient-info">
                <h3>Nome do Paciente 1</h3>
                <a href="#">Ver Detalhes</a>
            </div>
            <p>Idade: 30 anos</p>
            <p>Email: paciente1@example.com</p>
        </li>
        
        <li>
            <div class="patient-info">
                <h3>Nome do Paciente 2</h3>
                <a href="#">Ver Detalhes</a>
            </div>
            <p>Idade: 40 anos</p>
            <p>Email: paciente2@example.com</p>
        </li> -->

        <!-- Adicione mais pacientes conforme necessário -->
</body>

</html>