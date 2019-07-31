<?php require_once 'autoload.php' ?>
<?php
    try {
        $id = $_GET['id'];
        $pedido = new Pedido($id);
        $pedido->carregarProdutos();
        $listaProdutos = $pedido->produtos;
    } catch (Exception $e) {
        Erro::trataErro($e);
    }

 ?>
<?php require_once 'cabecalho.php' ?>

<div class="row">
    <div class="col-md-12">
        <h2>Detalhe do Pedido</h2>
    </div>
</div>

<dl>
    <dt>ID</dt>
    <dd><?php echo $pedido->id ?></dd>
    <dt>Nome</dt>
    <dd><?php echo $pedido->nome ?></dd>
	<dt>Data</dt>
    <dd><?php echo $pedido->data ?></dd>
    <dt>Produtos</dt>
    <?php if (count($listaProdutos)>0): ?>
        <dd>
            <ul>
                <?php foreach ($listaProdutos as $linha): ?>
                    <li><a href="/produtos-editar.php?id=<?php echo $linha['id']?>"><?php echo $linha['nome']?></a></li>
                <?php endforeach ?>
            </ul>
        </dd>
    <?php else: ?>
        <dd>Não Existem produtos para esta categoria</dd>
    <?php endif ?>
</dl>
<?php require_once 'rodape.php' ?>
