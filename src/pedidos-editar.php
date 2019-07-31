<?php require_once 'autoload.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $pedido = new Pedido($id);
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Pedido</h2>
    </div>
</div>
<form action="pedidos-editar-post.php" method="post">
<input type="hidden" name="id" value="<?php echo $pedido->id?>">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome da Pedido</label>
                <input type="text" name="nome" value="<?php echo $pedido->nome ?>" class="form-control" required>
            </div>
			<div class="form-group">
                <label for="nome">Quantidade</label>
                <input type="number" name="quantidade" value="<?php echo $pedido->quantidade ?>" class="form-control" required>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>
