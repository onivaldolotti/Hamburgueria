<?php require_once 'autoload.php' ?>
<?php
    try {
        $listaProduto = Produto::listar();
    } catch (Exception $e) {
        Erro::trataErro();
    }

 ?>
<?php require_once 'cabecalho.php' ?>
<div class="row">
    <div class="col-md-12">
        <h2> Novo Pedido</h2>
    </div>
</div>
<?php if (count($listaProduto)>0): ?>
<form action="pedidos-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Nome  do Produto</label>
                <select  name ="nome" class="form-control" placeholder="Nome do Produto" required>
				    <?php foreach ($listaProduto as $linha): ?>
					  <option text="<?php echo $linha['id']?>"><?php echo $linha['nome']?></option>
                    <?php endforeach ?>
			     </select>
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" name="quantidade" min="0" class="form-control" placeholder="Quantidade do Produto" required>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Confimar Pedido">
        </div>
    </div>
</form>
<?php else: ?>
    <p>Sem produtos cadastrados.</p>
<?php endif ?>
<?php require_once 'rodape.php' ?>
