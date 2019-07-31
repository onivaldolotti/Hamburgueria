<?php

class Produto
{
	public $id;
	public $nome;
	public $preco;
	public $descricao;
	public $categoria_id;

	public function __construct($id = false)
	{
		if($id) {
			$this->id= $id;
			$this->carregar();
		}
	}

	public static function listar()
	{
		$query = "SELECT p.id, p.nome, descricao, preco, categoria_id, c.nome as categoria_nome
				  FROM produtos p INNER JOIN categorias c ON p.categoria_id = c.id
				  ORDER BY c.nome";
		$conexao = Conexao::pegarConexao();
		$resultado = $conexao->query($query);
		$lista = $resultado->fetchAll();
		return $lista;
	}

	public static function listarPorCategoria($categoria_id)
	{
		$query = "SELECT id, nome, descricao, preco FROM produtos WHERE categoria_id = :categoria_id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':categoria_id', $categoria_id);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function inserir()
	{
		$query = "INSERT INTO produtos (nome, descricao, preco, categoria_id)
				  VALUES (:nome, :descricao, :preco, :categoria_id)";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':nome', $this->nome);
		$stmt->bindValue(':descricao', $this->descricao);
		$stmt->bindValue(':preco', $this->preco);
		$stmt->bindValue('categoria_id', $this->categoria_id);
		$stmt->execute();
	}

	public function carregar()
	{
		$query= "SELECT nome, descricao, preco, categoria_id FROM produtos WHERE id =:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
		$linha = $stmt->fetch();
		$this->nome = $linha['nome'];
		$this->descricao = $linha['descricao'];
		$this->preco= $linha['preco'];
		$this->categoria_id = $linha['categoria_id'];
	}

	public function atualizar()
	{
		$query = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, categoria_id = :categoria_id WHERE id= :id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue('nome', $this->nome);
		$stmt->bindValue('descricao', $this->descricao);
		$stmt->bindValue('preco', $this->preco);
		$stmt->bindValue('categoria_id', $this->categoria_id);
		$stmt->bindValue('id', $this->id);
		$stmt->execute();
	}

	public function excluir()
	{
		$query = "DELETE FROM produtos WHERE id=:id";
		$conexao = Conexao::pegarConexao();
		$stmt = $conexao->prepare($query);
		$stmt->bindValue(':id', $this->id);
		$stmt->execute();
	}
}
