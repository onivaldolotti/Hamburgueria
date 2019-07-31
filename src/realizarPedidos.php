<?php require_once 'autoload.php'?>
<?php
    try {
        $lista = Produto::listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>

<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2>Pedidos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="pedidos-criar.php" class="btn btn-info btn-block">Criar Novo Pedido</a><br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <h2>Nosso Cardapio</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if (count($lista)>0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['descricao']?></td>
                        <td>R$ <?php echo $linha['preco']?></td>
                        <td><?php echo $linha['categoria_nome']?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum produto cadastrado</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
