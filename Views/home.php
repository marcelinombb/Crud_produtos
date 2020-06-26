<?php
include "../config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/public/css/bootstrap.min.css">
    <title>Crud Produtos</title>
</head>

<body>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="inserir-tab" data-toggle="tab" href="#inserir" role="tab" aria-controls="inserir" aria-selected="false" onclick="loadFormNewProducts()">Cadastrar Produto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="lista_de_produtos-tab" data-toggle="tab" href="#lista_de_produtos" role="tab" aria-controls="lista_de_produtos" aria-selected="false" onclick="listadeprodutos()">lista de produtos</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="container">
                <h1>Crud Produtos teste</h1>
                <ul>
                    <li>Bootstrap 4</li>
                    <li>Jquery Ajax</li>
                    <li>PDO</li>
                    <li>POO</li>
                    <li>URL Amigavel</li>
                    <li>psr-4 namespaces</li>
                    <li>composer</li>
                    <li>MVC</li>
                </ul>
            </div>
        </div>
        <div class="tab-pane fade" id="inserir" role="tabpanel" aria-labelledby="inserir-tab"></div>
        <div class="tab-pane fade" id="lista_de_produtos" role="tabpanel" aria-labelledby="lista_de_produtos-tab"></div>
    </div>

    <script src="<?= BASE_URL; ?>/public/js/jquery.min.js"></script>
    <script src="<?= BASE_URL; ?>/public/js/bootstrap.min.js"></script>
    <script>
        const BASE_URL = "http://localhost/Crud_produtos";

        function listadeprodutos() {
            $("#lista_de_produtos").load(BASE_URL + "/Views/listadeprodutos.php");
        }

        function loadFormNewProducts() {
            $("#inserir").load(BASE_URL + "/Views/CadastroProdutos.php");
        }
    </script>
    <script>
        $('#navId a').click(e => {
            e.preventDefault();
            $(this).tab('show');
        });
    </script>

</body>

</html>