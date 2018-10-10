<?php

function excluiItem($itemId){
    dbConnect(1);
    //Pega os dados do item:
    $sql = "SELECT stFoto FROM tbItens WHERE stId='$itemId'";
    $query = $GLOBALS["con1"]->query($sql);
    if($query->num_rows == 0){
        echo 'Erro: no query results.';
        dbDisconnect(1);
        return false;
    }
    while($dados = $query->fetch_array(MYSQLI_ASSOC)){
        $itemFoto = $dados["stFoto"];
    }
    //Deleta o item do BD:
    $sql = "DELETE FROM tbItens WHERE stId='$itemId'";
    $query = $GLOBALS["con1"]->query($sql);
    if(!$query){
        echo 'Erro no query: '.mysqli_error($GLOBALS["con1"]);
        dbDisconnect(1);
        return false;
    }
    dbDisconnect(1);
    //Deleta o arquivo com a descrição:
    if(!unlink("../itens/descri/$itemId.php")){
        echo 'Não foi possível deletar o arquivo com a descrição.<br>';
    }
    //Deleta a foto do item:
    if(!unlink("../itens/fotos/$itemFoto")){
        echo 'Não foi possível deletar o arquivo da foto.<br>';
    }
    //Chegou ao final, deu tudo certo:
    return true;
}

