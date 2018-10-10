<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="View/css/admin.css">
        <script src="View/js/scripts.js"></script>
    </head>
    <body>
        <?php
            session_start();
            if(!isset($_SESSION["logged"])){    //Se o usuário não estiver logado, redireciona
                header("location: admin.php");
                die();
            }
            echo "<h1>Cadastro de Item</h1>";
            //Exibe o form de insert:
            echo "<form id='form' action='Controller/controller.php' method='post' enctype='multipart/form-data'>"
                    . "Nome: <input name='inputNome' id='inputNome' type='text'><br>"
                    . "Foto: <input name='arquivo' type='file' size='20'><br>"
                    . "Categoria: <select name='inputCategoria'>"
                    . "             <option value='Sapatinho'>Sapatinho</option>"
                    . "             <option value='Casaquinho'>Casaquinho</option>"
                    . "             <option value='Vestido'>Vestido</option>"
                    . "             <option value='Sandália'>Sandália</option>"
                    . "             <option value='Chapéu'>Chapéu</option>"
                    . "             <option value='Boneco'>Boneco</option>"
                    . "</select><br><textarea name='inputDescricao' id='inputDescri' cols='30' rows='8'>"
                    . "Descrição</textarea><br>"
                    . "<input type='hidden' name='token' value='insert'>"
                    . "<input type='hidden' name='inputId' id='inputId'>"
                    . "</form><br><button onclick='cadastrar()'>Cadastrar</button>"
                    . "<a href='admin.php'>Cancelar</a></div>";
        ?>

    </body>
</html>
