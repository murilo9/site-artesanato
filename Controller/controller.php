<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../View/css/admin.css">
    </head>
    <body>
        <?php
        include_once '../Model/model.php';
        session_start();
        $token = $_POST["token"];
        switch ($token){        //------ Verificação do token ------
            case "login":           //LOGIN
                $login = $_POST["inputLogin"];
                $senha = $_POST["inputSenha"];
                dbConnect(1);
                $sql = "SELECT stSenha FROM tbAdmins WHERE stLogin='$login'";
                $query = $GLOBALS["con1"]->query($sql);
                if(!$query)
                    die('Erro no query: '.mysqli_error($GLOBALS["con1"]));
                if($query->num_rows>0){
                    while($dados = $query->fetch_array(MYSQLI_ASSOC)){
                        if($senha == $dados["stSenha"]){    //Login bem-sucedido
                            dbDisconnect(1);
                            $_SESSION["logged"] = true;
                            header("location: ../admin.php");
                        }else{      //Login mal-sucedido
                            dbDisconnect(1);
                            unset($_SESSION["logged"]);
                            header("location: ../admin.php");
                        }
                    }
                }
                dbDisconnect(1);
                break;
            case 'insert':          //CADASTRAR ITEM
                $itemId = $_POST["inputId"];
                $itemNome = $_POST["inputNome"];
                $itemCategoria = $_POST["inputCategoria"];
                $itemDescricao = $_POST["inputDescricao"];
                //Faz o upload da foto pro servidor:
                $uploadDir = '../itens/fotos/';
                $file = $_FILES["arquivo"]["name"];
                if($file == ''){
                    echo 'O item deve ter uma foto.<br>';
                    return false;
                }
                $uploadFile =$uploadDir.$file;
                if(!move_uploaded_file($_FILES["arquivo"]["tmp_name"], $uploadFile)){
                    echo 'Erro ao fazer upload da imagem.<br><a href="admin.php">Voltar</a>';
                    break;
                }
                //Tenta fazer o cadastro do item no BD:
                $cadastro = cadastraItem($itemId, $itemNome, $itemCategoria, $file, $itemDescricao);  
                if(!$cadastro){
                    echo '<a href="../admin.php">Voltar</a>';
                }
                //Se chegou até aqui, deu tudo certo e exibe a mensagem de sucesso:
                echo 'Item cadastrado com sucesso.<br><a href="../insert.php">Voltar</a>';
                break;
            case 'exclui':      //EXCLUIR ITEM
                $itemId = $_POST["itemId"];
                if(!excluiItem($itemId)){
                    echo '<a href="../pesquisa.php">Voltar</a>';
                }else{
                    echo 'Item excluído do cadastro com sucesso.<br><a href="../pesquisa.php">Voltar</a>';
                }
                break;
            case 'modifica':    //MODIFICA ITEM
                $itemId = $_POST["inputId"];
                $itemNome = $_POST["inputNome"];
                $itemDescricao = $_POST["inputDescri"];
                $itemCategoria =$_POST["inputCategoria"];
                $itemFoto = '';
                $mudarFoto = false;
                if(isset($_POST["mudarFoto"])){
                    if($_POST["mudarFoto"] == 'true'){
                        $mudarFoto = true;
                        $uploadDir = '../itens/fotos/';
                        $file = $_FILES["arquivo"]["name"];
                        $itemFoto = $file;
                        $uploadFile =$uploadDir.$file;
                        if(!move_uploaded_file($_FILES["arquivo"]["tmp_name"], $uploadFile)){
                            echo 'Erro ao fazer upload da imagem.<br><a href="../admin.php">Voltar</a>';
                            break;
                        }
                    }
                }
                if(!modificaItem($itemId,$itemNome,$itemDescricao,$mudarFoto,$itemFoto,$itemCategoria)){
                    echo '<a href="admin.php">Voltar</a>';
                }else{
                    echo 'Item modificado com sucesso.<br><a href="../admin.php">Voltar</a>';
                }
                break;
            default:
                echo 'No token';
                break;
        }
        ?>
    </body>
</html>
