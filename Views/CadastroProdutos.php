<?php
include_once "../config.php";
?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <form action="<?= BASE_URL; ?>/product/newProduct" method="post" enctype="multipart/form-data" class="jumbotron" style="margin-top: 30px">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="name" id='nome' class="form-control" placeholder="Nome" required>
                    </div>
                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="number" step=".01" name="price" id='preco' class="form-control" placeholder="Preço" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descrição</label>
                        <textarea name="description" id='desc' class="form-control" placeholder="Descrição" required value=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" name="image" id='imagem' class="form-control" placeholder="imagem">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-md btn-success" value="Cadastrar Produto">
                    </div>
                </form>
            </div>
        </div>
    </div>