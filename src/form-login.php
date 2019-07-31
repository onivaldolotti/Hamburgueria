<!DOCTYPE html>
<html>
<head>
	<title>Faça Login Abaixo</title>
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

	<h1>Login</h1>
	<span>ou <a href="register.php">Registre-se aqui</a></span>

	<form action="login.php" method="POST">

		<input type="text" placeholder="Entre com seu e-mail" name="email">
		<input type="password" placeholder="e senha" name="password">

		<input type="submit" value="Entrar">

	</form>

</body>
</html>
