<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="View/css/site.css">
        <script src="View/js/scripts.js"></script>
        <title>Bebê Coelhinho</title>
    </head>
    <body>
        <header>
            <div id="titulo">
                <div>
                    <a href="admin.php"><img src="View/img/coelho.png"></a>
                </div><div>
                    <h1>Bebê Coelhinho</h1>
                    <h3>Artesanato em Crochê</h3>
                </div>
            </div>
            <nav id="mobile">
                <button onclick="categorias()">Categorias</button>
                <button onclick="location='contato.php'">Contato</button>
            </nav>
            <div id="categorias" style='display: none'><!-- Esta div só aparece na versão mobile, ao clicar -->
                <button onclick="location='index.php?categoria=Sapatinho'">Sapatinhos</button>
                <button onclick="location='index.php?categoria=Casaquinho'">Casacos</button>
                <button onclick="location='index.php?categoria=Sandalia'">Sandálias</button>
                <button onclick="location='index.php?categoria=Chapeu'">Chapéus e Gorros</button>
                <button onclick="location='index.php?categoria=Boneco'">Bonecos</button>
            </div>
        </header>
        <div id="content">