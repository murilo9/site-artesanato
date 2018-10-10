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
            echo "<div id='menu'><h3>Modificar ou Excluir Itens</h3><a href='admin.php'>Voltar</a>"
                    . "<select name='inputCategoria' id='inputCategoria'>"
                    . "<option value='none'>Escolher cateogria</option>"
                    . "<option value='Sapatinho'>Sapatinho</option>"
                    . "<option value='Casaquinho'>Casaquinho</option>"
                    . "<option value='Vestido'>Vestido</option>"
                    . "<option value='Chapéu'>Chapéu</option>"
                    . "<option value='Sandália'>Sandália</option>"
                    . "<option value='Boneco'>Boneco</option></select>"
                    . "</div><br>";
            echo "<div id='resultado'></div>";
        ?>
        <form id='formExclui' action="Controller/controller.php" method='post'>
            <input name='itemId' type='hidden' id="itemId">
            <input name='token' type="hidden" value="exclui">
        </form>
        <script>
            var inputSelect = document.getElementById("inputCategoria");    //Pega o select
            var resultado = document.getElementById("resultado");
            
            function loadDoc(){ 
                var xhttp = new XMLHttpRequest(); 
                xhttp.onreadystatechange = function() { 
                    if (this.readyState == 4 && this.status == 200) { 
                      resultado.innerHTML = this.responseText; 
                    } 
                };
                xhttp.open("POST", "Controller/ajax.php", true); 
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
                xhttp.send("token=pesquisa&categoria="+inputSelect.value);  
            } 
            
            inputSelect.onchange = function(){   //Função de fazer consulta ao escolher select
                loadDoc();
            };
            
            function excluiItem(item){      //Exclui um item do DB
                var formulario = document.getElementById("formExclui");
                if(confirm('Tem certeza que deseja excluir este item do cadastro?')){
                    document.getElementById("itemId").value = item;     //Atribui a ID do item ao input da form
                    formulario.submit();        //Dá submit na form
                }
            }
        </script>
    </body>
</html>