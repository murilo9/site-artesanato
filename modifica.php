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
            include_once 'Model/model.php';
            session_start();
            if(!isset($_SESSION["logged"])){    //Se o usuário não estiver logado, redireciona
                header("location: admin.php");
                die();
            }
            if(isset($_GET["item"])){
                $itemId = $_GET["item"];
            }
            dbConnect(1);
            $sql = "SELECT * FROM tbItens WHERE stId='$itemId'";
            $query = $GLOBALS["con1"]->query($sql);
            if($query->num_rows == 0){
                dbDisconnect(1);
                echo 'Erro: nenhum resultado no query.<br><a href="pesquisa.php">Voltar</a>';
                die();
            }
            while($dados = $query->fetch_array(MYSQLI_ASSOC)){
                $itemNome = $dados["stNome"];
                $itemCategoria = $dados["stCategoria"];
                $itemFoto = $dados["stFoto"];
                $itemDescricao = '';
            }
            dbDisconnect(1);
            //Pega a descrição do item:
            $arquivoAberto = fopen("itens/descri/$itemId.php", 'r');
            while (!feof($arquivoAberto)){
                $itemDescricao .= fgets($arquivoAberto);
            }
            fclose($arquivoAberto);
            echo "<h1>Modificar Item</h1>"
                . "<form id='formulario' action='Controller/controller.php' "
                    . "method='post' enctype='multipart/form-data'>"
                    . "Nome: <input name='inputNome' id='inputNome' type='text' value='$itemNome'><br>"
                    . "<img src='itens/fotos/$itemFoto' style='width: 192px'><br>"
                    . "<input type='checkbox' name='mudarFoto' id='mudarFoto' value='true'> Mudar foto: "
                    . "<input name='arquivo' id='arquivo' type='file' size='20'><br>"
                    . "Categoria: <select name='inputCategoria'>"
                    . "<option value='Sapatinho'>Sapatinho</option>"
                    . "<option value='Casaquinho'>Casaquinho</option>"
                    . "<option value='Vestido'>Vestido</option>"
                    . "<option value='Sandália'>Sandália</option>"
                    . "<option value='Chapéu'>Chapéu</option>"
                    . "<option value='Boneco'>Boneco</option></select><br>"
                    . "Descrição:<br><textarea name='inputDescri' id='inputDescri'>$itemDescricao</textarea>"
                    . "<input name='inputId' type='hidden' value='$itemId'>"
                    . "<input name='token' type='hidden' value='modifica'>"
                    . "</form><button onclick='modificar()'>Atualizar</button>";
        ?>
    </body>
</html>
