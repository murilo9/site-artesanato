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
            if(isset($_GET["sair"])){   //Primeiro verifica se possui o token de sair:
                session_unset();  //Destrói a session
                session_destroy();
                header("location: index.php");
                die();
            }
            if(!isset($_SESSION["logged"])){    //Se o usuário não estiver logado, exibe o form de login:
                echo "<form action='Controller/controller.php' method='post'>"
                        . "<input name='token' type='hidden' value='login'>"
                        . "Login: <input name='inputLogin' type='text'><br>"
                        . "Senha: <input name='inputSenha' type='password'><br>"
                        . "<input type='submit' value='Entrar'>"
                    . "</form>";
            }else if($_SESSION["logged"]){      //Caso esteja logado, exibe os botões de admin:
                echo "<div class='main'>"
                        . "<a href='insert.php'>Inserir Itens</a><br>"
                        . "<a>Modificar ou Excluir Itens</a><br>"
                        . "<a href='admin.php?sair=true'>Sair</a>"
                    . "</div>";
            }
        ?>
    </body>
</html>
