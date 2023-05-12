<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilopaginalogin.css">

	<title>Login</title>
</head>
<body>
	<h2>Login</h2>
	<form method="post" action="verifica_login.php">
		<label>Email:</label>
		<input type="email" name="email"><br>
		<label>Senha:</label>
		<input type="password" name="senha"><br>
		<input type="submit" value="Login">
        <button type="button" onclick="location.href='registro.php';">Não tem uma conta?</button>
	</form>
</body>
</html>
