<?php

function cadastraItem($id, $nome, $categoria, $foto, $descricao){
    //Faz insert no BD:
    dbConnect(1);
    $sql = "INSERT INTO tbItens VALUES ('$id','$nome','$categoria','$foto')";
    $query = $GLOBALS["con1"]->query($sql);
    if(!$query){
        dbDisconnect(1);
        echo 'Erro ao cadastrar item no banco de dados (query).<br>';
        return false;
    }
    dbDisconnect(1);
    //Cria arquivo com a descrição:
    $arquivoAberto = fopen("../itens/descri/$id",'w');
    if(!$arquivoAberto){
        echo 'Erro ao criar arqivo de descrição(fopen).<br>';
        return false;
    }
    if(!fwrite($arquivoAberto, $descricao)){
        echo 'Erro ao escrever arqivo de descrição(fwrite).<br>';
        return false;
    }
    fclose($arquivoAberto);
    return true;
}
