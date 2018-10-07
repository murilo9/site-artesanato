<?php

$GLOBALS["con1"] = '';
$GLOBALS["con2"] = '';

/**
 * Abre $qnt conexões (1 ou 2) com o BD, retorna false e uma mensagem de erro em caso de falha.
 * @param type $qnt
 * @return boolean
 */
function dbConnect($qnt){
    switch($qnt){
        case 1:
            $GLOBALS["con1"] = mysqli_connect('127.0.0.1', 'root', '', 'dbCoelho', '3306');
            if(!$GLOBALS["con1"]){
                echo 'Erro no query (conectar ao BD):'.mysqli_error ($con);
                return false;
            }else
                return true;
            break;
        case 2:
            $GLOBALS["con1"] = mysqli_connect('127.0.0.1', 'root', '', 'dbCoelho', '3306');
            $GLOBALS["con2"] = mysqli_connect('127.0.0.1', 'root', '', 'dbCoelho', '3306');
            if(!$GLOBALS["con1"] || !$GLOBALS["con2"]){
                echo 'Erro no query (conectar ao BD):'.mysqli_error ($con);
                return false;
            }else
                return true;
            break;
        default:
            return false;
    }
}
/**
 * Fecha todas as conexões com o BD
 */
function dbDisconnect(){
    mysqli_close($GLOBALS["con1"]);
    mysqli_close($GLOBALS["con2"]);
}
