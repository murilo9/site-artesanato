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
                    $_SESSION["logged"] = true;
                    header("location: ../admin.php");
                }else{      //Login mal-sucedido
                    unset($_SESSION["logged"]);
                    header("location: ../admin.php");
                }
            }
        }
        dbDisconnect();
        break;
    case 'insert':          //CADASTRAR ITEM
        
        break;
    default:
        echo 'No token';
        break;
}

