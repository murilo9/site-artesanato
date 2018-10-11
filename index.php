<?php
    include_once 'View/_header.php';
    include_once 'View/_nav.php';
    include_once 'Model/model.php';
?>
<section>
    <?php
    if(!isset($_GET["categoria"])){
        $categoria = "Sapatinho";
    }else{
        $categoria = $_GET["categoria"];
        //Correção dos acentos:
        if($categoria == 'Chapeu'){
            $categoria = 'Chapéu';}
        if($categoria == 'Sandalia'){
            $categoria = 'Sandália';}
    }
    dbConnect(1);
    $sql = "SELECT * FROM tbItens WHERE stCategoria='$categoria'";
    $query = $GLOBALS["con1"]->query($sql);
    if($query->num_rows>0){
        while($dados = $query->fetch_array(MYSQLI_ASSOC)){
            $itemId = $dados["stId"];
            $itemNome = $dados["stNome"];
            $itemFoto = $dados["stFoto"];
            $itemDescricao = '';
            //Pega o arquivo com a descrição:
            $arquivoAberto = fopen("itens/descri/$itemId.php", 'r');
            while (!feof($arquivoAberto)){
                $itemDescricao .= fgets($arquivoAberto);
            }
            fclose($arquivoAberto);
            //Exibe os articles:
            echo "<article><h2>$itemNome</h2>"
                    . "<img src='itens/fotos/$itemFoto'>"
                    . "<p>$itemDescricao</p></article><hr>";
        }
    }
    dbDisconnect(1);
    ?>
</section>
<?php
    include_once 'View/_aside.php';
    include_once 'View/_footer.php';
?>