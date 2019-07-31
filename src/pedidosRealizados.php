<?php require_once 'autoload.php'?>
<?php
    try {
        $lista = Pedido::listar();
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
    <div class="col-md-12">
        <?php if (count($lista)>0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Pedido Realizado:</th>
                    <th class="acao">Editar</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td>Pedido <?php echo $linha['id'] ?></td>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['quantidade']?></td>
                        <td><?php echo $linha['data']?></td>
                        <td><a href="/pedidos-editar.php?id=<?php echo $linha['id']?>" class="btn btn-info">Editar</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum pedido cadastrado</p>
        <?php endif ?>
    </div>
</div>
<?php require_once 'rodape.php' ?>
