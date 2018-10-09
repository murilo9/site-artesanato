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
            if(!isset($_SESSION["logged"])){    //Se o usuário não estiver logado, redireciona
                header("location: admin.php");
                die();
            }
            echo '<h1>Cadastro de Item</h1>';
            //Exibe o form de insert:
            echo "<form action='Controller/controller.php' method='post' enctype='multipart/form-data'>"
                    . "Nome: <input name='inputNome' type='text'><br>"
                    . "Foto: <input name='arquivo' type='file' size='20'><br>"
                    . "Categoria: <select name='inputCategoria'>"
                    . "             <option value='sapatinho'>Sapatinho</option>"
                    . "             <option value='casquinho'>Casquinho</option>"
                    . "             <option value='vestido'>Vestido</option>"
                    . "             <option value='sandalia'>Sandália</option>"
                    . "             <option value='chapeu'>Chapéu</option>"
                    . "             <option value='boneco'>Boneco</option>"
                    . "</select><br><textarea name='inputDescricao' cols='30' rows='8'>Descrição</textarea><br>"
                    . "<input type='hidden' name='token' value='insert'>"
                    . "<input type='submit' value='Cadastrar'></form>"
                    . "<a href='admin.php'>Cancelar</a></div>";        
        ?>

    </body>
</html>
