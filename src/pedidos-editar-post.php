<?php require_once 'autoload.php'?>

<?php
	try{
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$quantidade = $_POST['quantidade'];

		$pedido = new Pedido($id);
		$pedido->nome = $nome;
		$pedido->quantidade= $quantidade;

		$pedido->atualizar();

		header('Location: pedidos.php');
	} catch (Exception $e) {
		Erro::trataErro($e);
	}
