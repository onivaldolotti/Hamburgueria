<?php
	require_once 'autoload.php';

	try {
		$nome = $_POST['nome'];
		$quantidade = $_POST['quantidade'];

		$pedido = new Pedido();

		$pedido->nome = $nome;
		$pedido->quantidade = $quantidade;
		$pedido->data = date('Y-m-d H:i:s');
		$pedido->inserir();

		header('Location: realizarPedidos.php');

	} catch (Exception $e) {
		Erro::trataErro($e);
	}
