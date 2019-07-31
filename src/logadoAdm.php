<?php
require 'check.php'
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
        <h2>Seja bem-vindo ao Sistema Valbernielson's Hambuergueria</h2>
        <p>Selecione uma das opções do Menu para começar a usar o Sistema</p><br>
        <p>Bem-vindo, <?php echo $_SESSION['user_name']; ?> | <a href="logout.php">Sair</a></p>
    </div>
</div>
<?php require_once 'rodape.php' ?>
