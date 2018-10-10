<?php

function modificaItem($itemId,$itemNome,$itemDescricao,$mudarFoto,$itemFoto,$itemCategoria){
    //Atualiza item no BD:
    dbConnect(1);
    if($mudarFoto){     //Update com foto
        $sql = "UPDATE tbItens SET stNome='$itemNome', stCategoria='$itemCategoria', "
                . "stFoto='$itemFoto' WHERE stId='$itemId'";
        $query = $GLOBALS["con1"]->query($sql);
        if(!$query){
            echo 'Erro no query: '.mysqli_error($GLOBALS["con1"]);
            dbDisconnect(1);
            return false;
        }
    }else{      //Update sem foto
        $sql = "UPDATE tbItens SET stNome='$itemNome', stCategoria='$itemCategoria' WHERE stId='$itemId'";
        $query = $GLOBALS["con1"]->query($sql);
        if(!$query){
            echo 'Erro no query: '.mysqli_error($GLOBALS["con1"]);
            dbDisconnect(1);
            return false;
        }
    }
    dbDisconnect(1);
    //Atualiza arquivo com a descrição:
    $arquivoAberto = fopen("../itens/descri/$itemId.php", 'w');
    if(!$arquivoAberto){
        echo 'Erro ao abrir arquivo de descrição (fopen)<br>';
        return false;
    }
    fwrite($arquivoAberto, $itemDescricao);
    fclose($arquivoAberto);
    return true;
}
