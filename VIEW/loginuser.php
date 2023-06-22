<?php
include_once "../webconfig.html"
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="userstyle.css">
</head>

<body>
    <div class="container">
        <center>
            <div>
                <form name="loginForm" method="POST" action="../Controller/logUserControl.php">
                    <table>
                        <tr>
                            <td>
                                <h1>Login</h1>
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
                                <input type="submit" name="entrar" value="Entrar">
                                <a href="registeruser.php" class="btn-reg"></i> Registrar</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </center>
    </div>
</body>

</html>