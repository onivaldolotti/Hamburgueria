<?php

require_once 'autoload.php';

try {
	$id = $_GET['id'];
	$pedido = new Pedido($id);
	$pedido->excluir();

	header('Location: pedidos.php');

} catch (Exception $e) {
	Erro::trataErro($e);
}
