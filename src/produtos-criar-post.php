<?php
	require_once 'autoload.php';

	try {
		$nome = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$preco = $_POST['preco'];
		$categoria_id = $_POST['categoria_id'];

		$produto = new Produto();

		$produto->nome = $nome;
		$produto->descricao = $descricao;
		$produto->preco = $preco;
		$produto->categoria_id = $categoria_id;
		$produto->inserir();

		header('Location: produtos.php');

	} catch (Exception $e) {
		Erro::trataErro($e);
	}
