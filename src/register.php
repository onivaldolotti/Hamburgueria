<?php
require_once 'autoload.php';

error_reporting(0);

if( isset($_SESSION['user_id']) ){
	header("Location: index.php");
}

$message = '';
try {
if(!empty($_POST['email']) && !empty($_POST['password'])):


	$sql = "INSERT INTO usuarios (name, email, password) VALUES (:name, :email, :password)";
	$conexao = Conexao::pegarConexao();
	$stmt = $conexao->prepare($sql);
	$stmt->bindParam(':name', $_POST['name']);
	$stmt->bindParam(':email', $_POST['email']);
	$stmt->bindParam(':password', Functions::make_hash($_POST['password']));
	if( $stmt->execute() ):
		$message = 'Novo usuario criado com sucesso';
	else:
		$message = 'Ocorreu um erro ao criar sua conta';
	endif;
endif;
} catch (Exception $e) {
	Erro::trataErro($e);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registre Abaixo</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Valbernielson's Hambuergueria</a>
	</div>

	<?php if(!empty($message)): ?>
		<p><?= $message ?></p>
	<?php endif; ?>

	<h1>Registre-se</h1>
	<span>ou <a href="form-login.php">Logue aqui</a></span>

	<form action="register.php" method="POST">

		<input type="text" placeholder="Nome de Usuário" name="name">
		<input type="text" placeholder="Entre com seu e-mail" name="email">
		<input type="password" placeholder="e senha" name="password">
		<input type="submit">

	</form>

</body>
</html>
