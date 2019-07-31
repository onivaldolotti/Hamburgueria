<?php require_once 'autoload.php'?>
<?php
    try {
        $lista = Produto::listar();
    } catch (Exception $e) {
        Erro::trataErro($e);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Valbernielson's Hambuergueria</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Valbernielson's Hambuergueria</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/logadoAdm.php">Valbernielson's Hambuergueria</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/categorias.php">Categorias</a></li>
                <li><a href="/produtos.php">Produtos</a></li>
                <li><a href="/pedidos.php">Pedidos</a></li>
            </ul>
        </div><!--/.navbar-collapse -->
    </div>
</nav>

<div class="container">
<div class="row">
    <div class="col-md-12">
        <h2>Produtos</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <a href="produtos-criar.php" class="btn btn-info btn-block">Criar Novo Produto</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php if (count($lista)>0): ?>
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($lista as $linha): ?>
                    <tr>
                        <td><?php echo $linha['id']?></td>
                        <td><?php echo $linha['nome']?></td>
                        <td><?php echo $linha['descricao']?></td>
                        <td>R$<?php echo $linha['preco']?></td>
                        <td><?php echo $linha['categoria_nome']?></td>
                        <td><a href="/produtos-editar.php?id=<?php echo $linha['id']?>" class="btn btn-info">Editar</a></td>
                        <td><a href="/produtos-excluir-post.php?id=<?php echo $linha['id']?>" class="btn btn-danger">Excluir</a></td>
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
