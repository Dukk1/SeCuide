<?php
include_once "../webconfig.html"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="userstyle.css">
</head>

<body>
    <div class="container">
        <center>
            <div>
                <form name="cadUser" method="POST" action="../CONTROLLER/cadUserControl.php">
                    <table>
                        <tr>
                            <td>
                                <h1>Cadastrar Usuario</h1>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <input type="text" name="nome" placeholder="Nome">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="email" name="email" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="login" placeholder="Login">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="senha" placeholder="Senha">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <select name="perfil">
                                    <option value="2">Médico</option>
                                    <option value="3">Paciente</option>
                                    <option value="4">Funcionario</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="gravar" value="Gravar">

                                <input type="reset" name="limpar" value="Limpar">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </center>
    </div>
</body>

</html>