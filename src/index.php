<?php

require_once 'autoload.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bem Vindo a Valbernielson's Hambuergueria</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Comfortaa' rel='stylesheet' type='text/css'>
</head>
<body>

	<div class="header">
		<a href="/">Valbernielson's Hambuergueria</a>
	</div>

	<?php if (Functions::isLoggedIn()): ?>

		<br />Bem Vindo <?php echo $_SESSION['user_name']; ?>
		<br /><br />Voce foi logado com sucesso!
		<br /><br />
		<a href="logado.php">Logado</a>
		<a href="logout.php">Deslogar?</a>

	<?php else: ?>

		<h1>Por favor faça o login ou registre-se</h1>
		<a href="form-login.php">Login</a> ou
		<a href="register.php">Registre-se</a>

	<?php endif; ?>

</body>
</html>
