function categorias(){
    document.getElementById("categorias").style = "display: inline";
}

function cadastrar(){
    var form = document.getElementById("form");
    if(document.getElementById("inputNome").value == ''){   //Verifica nome vazio
        alert('Insira um nome para o item.');
        return false;
    }
    if(document.getElementById("inputDescri").value == ''){   //Verifica descrição vazia
        alert('Insira uma descrição para o item.');
        return false;
    }
    document.getElementById("inputId").value = '_'+Math.floor(Math.random()*9999);  //Gera ID aleatório
    form.submit();
}

function modificar(){
    var formulario = document.getElementById("formulario");
    if(document.getElementById("inputNome").value == ''){   //Verifica nome vazio
        alert('Insira um nome para o item.');
        return false;
    }
    if(document.getElementById("inputDescri").value == ''){   //Verifica descrição vazia
        alert('Insira uma descrição para o item.');
        return false;
    }
    if(document.getElementById("mudarFoto").checked
            && document.getElementById("arquivo").value == ''){
        alert('Escolha um arquivo para a nova foto.');
        return false;
    }
    if(confirm("Tem certeza que deseja atualizar as informações sobre este item?"))
        formulario.submit();
    else
        return false;
}