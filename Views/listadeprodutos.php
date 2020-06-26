<?php
include_once "../vendor/autoload.php";
include "../config.php";

use Controllers\ProductController;

$prodlist = new ProductController();
$listProd = $prodlist->listProducts();
if (empty($listProd)) {
    echo "<h3>Nenhum produto cadastrado</h3>";
}
?>

<div class="container">
    <div class="row" style='margin-top: 30px'>
        <?php foreach ($listProd as $key => $value) : ?>
            <div class="col-sm-4">
                <div class="card" style="width:300px">
                    <img class="card-img-top img-fluid" src="../public/images/<?= $value['image']; ?>" alt="Card image" style="width:20rem;height:10rem">
                    <div class="card-body">
                        <h4 class="card-title"><?= $value['name']; ?></h4>
                        <h6 class="card-subtitle mb-2 ">Preço : <?= $value['price']; ?> </h6>
                        <p class="card-text"><?= $value['description']; ?></p>
                        <a href="<?= BASE_URL; ?>/product/deleteProduct/<?= $value['id']; ?>" class="btn btn-danger">Excluir</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ExemploModalCentralizado<?= $value['id']; ?>">
                            Atualizar
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="ExemploModalCentralizado<?= $value['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalCentralizado">Atualizar dados do produto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASE_URL; ?>/product/updateProduct" method="post" enctype="multipart/form-data" class="jumbotron" style="margin-top: 30px">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="hidden" name="id" value="<?= $value['id']; ?>">
                                    <input type="text" name="name" id='nome' class="form-control" placeholder="Nome" required value="<?= $value['name']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="number" step=".01" name="price" id='preco' class="form-control" placeholder="Preço" required value="<?= $value['price']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="desc">Descrição</label>
                                    <textarea name="description" id='desc' class="form-control" placeholder="Descrição" required value=""><?= $value['description']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="imagem">Imagem</label>
                                    <input type="hidden" name="filename" value="<?= $value['image']; ?>">
                                    <input type="file" name="image" id='imagem' class="form-control" placeholder="imagem">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-md btn-success" value="atualizar Produto">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>