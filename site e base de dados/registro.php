<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilopaginaregistro.css">

	<title>Registro</title>
</head>
<body>
	<h2>Registro</h2>
	<form method="post" action="registra_usuario.php">
		<label>Nome:</label>
		<input type="text" name="nome"><br>
		<label>Email:</label>
		<input type="email" name="email"><br>
		<label>Senha:</label>
		<input type="password" name="senha"><br>
		<input type="submit" value="Registrar">
		<button type="button" onclick="location.href='login.php';">Já tem uma conta?</button>
	</form>
</body>
</html>
