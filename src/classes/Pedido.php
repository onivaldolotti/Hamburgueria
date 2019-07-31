<?php

class Pedido
{
	public $id;
	public $nome;
	public $quantidade;
	public $data;
	public $produtos;

	public function __construct($id = false)
	{
		if($id) {
			$this->id= $id;
			$this->carregar();
		}
	}

	public function carregar()
	{
		$query= "SELECT nome, quantidade FROM pedidos WHERE id =:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
		$linha = $stmt->fetch();
		$this->nome = $linha['nome'];
		$this->quantidade = $linha['quantidade'];

	}

	public function inserir()
	{
		$query = "INSERT INTO pedidos (nome, quantidade, data) VALUES (:nome, :quantidade, :data)";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':quantidade', $this->quantidade);
		$stmt->bindValue(':data', $this->data);
		$stmt->execute();
	}

	public static function listar()
	{
		$query = "SELECT id, nome, quantidade, data FROM pedidos";
		$conexao = Conexao::pegarConexao();
		$resultado = $conexao->query($query);
		$lista = $resultado->fetchAll();
		return $lista;
	}

	public function atualizar()
	{
		$query ="UPDATE pedidos SET nome =:nome, quantidade = :quantidade WHERE id=:id";
		$conexao = Conexao::pegarConexao();
		$stmt= $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':quantidade', $this->quantidade);
		$stmt->execute();
	}

	public function excluir()
	{
		$query = "DELETE FROM pedidos WHERE id=:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
	}

	public function carregarProdutos()
    {
        $this->produtos = Produto::listarPorCategoria($this->id);
    }
}
