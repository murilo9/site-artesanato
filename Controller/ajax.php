<?php
    include_once '../Model/model.php';
    $token = $_POST["token"];
    switch ($token){
        case 'pesquisa':
            if($_POST["categoria"] == 'none'){
                echo "<div class='item'>Escolha uma categoria<div>";
                die();
            }else{
                $categoria = $_POST["categoria"];
            }
            //Pega os itens no DB:
            dbConnect(1);
            $sql = "SELECT * FROM tbItens WHERE stCategoria ='$categoria'";
            $query = $GLOBALS["con1"]->query($sql);
            if($query->num_rows>0){     //Se há itens nesta categoria
                while($dados = $query->fetch_array(MYSQLI_ASSOC)){
                    $itemId = $dados["stId"];
                    $itemNome = $dados["stNome"];
                    $itemFoto = $dados["stFoto"];
                    //Exibe a div com as informações finais do item:
                    echo "<div class='item'><img src='itens/fotos/$itemFoto'><br>"
                            . "$itemNome<br><a href='modifica.php?item=$itemId'>Mofidicar</a>"
                            . "<button onclick='excluiItem(".'"'.$itemId.'"'.")'>Excluir</button></div>";
                }
            }else{      //Se não há itens nesta categoria
                echo 'Não há itens cadastrados nesta categoria.';
            }
            dbDisconnect(1);
            break;
        default:
            
    }
