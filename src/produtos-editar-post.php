<?php

require_once 'autoload.php';

try {
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];

	$produto = new Produto($id);
	$produto->nome = $nome;
	$produto->preco = $preco;
	$produto->descricao = $descricao;
	$produto->categoria_id = $categoria_id;
	$produto->atualizar();

	header('Location: produtos.php');

} catch (Exception $e) {
	Erro::trataErro($e);
}
