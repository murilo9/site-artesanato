<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="View/css/admin.css">
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION["logged"])){
                echo "<form action='Controller/controller.php' method='post'>"
                        . "<input name='token' type='hidden' value='login'>"
                        . "Login: <input name='inputLogin' type='text'><br>"
                        . "Senha: <input name='inputSenha' type='password'><br>"
                        . "<input type='submit' value='Entrar'>"
                    . "</form>";
            }
        ?>
    </body>
</html>
