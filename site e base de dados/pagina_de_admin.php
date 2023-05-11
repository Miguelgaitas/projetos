<?php


include("./verificaradm.php");

?>


<!DOCTYPE html>
<html>
<head>

	<title>Meu Site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Estilo para o cabeçalho */
        body {
	font-family: Arial, sans-serif;
	background-color: #f2f2f2;
	margin: 0;
	padding: 0;
}

/* Estilo do cabeçalho */
header {
	background-color: #333;
	color: #fff;
	padding: 20px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}

/* Estilo do título do cabeçalho */
header h1 {
	margin: 0;
}

/* Estilo da navegação */
nav {
	display: flex;
}

nav a {
	color: #fff;
	text-decoration: none;
	margin-right: 20px;
	font-size: 18px;
	transition: all 0.2s ease-in-out;
}

nav a:hover {
	text-decoration: underline;
	transform: scale(1.1);
}

/* Estilo do conteúdo principal */
main {
	padding: 20px;
}

/* Estilo do rodapé */
footer {
	background-color: #333;
	color: #fff;
	padding: 20px;
	text-align: center;
}

/* Estilo do texto no rodapé */
footer p {
	margin: 0;
	font-size: 16px;
}

/* Estilo do link no rodapé */
footer a {
	color: #fff;
	text-decoration: none;
	font-weight: bold;
	transition: all 0.2s ease-in-out;
}

footer a:hover {
	text-decoration: underline;
	transform: scale(1.1);
}
nav a.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 10px;
}
.copy-button {
	background-color: #eee;
	border: none;
	border-radius: 3px;
	color: #333;
	cursor: pointer;
	font-size: 14px;
	padding: 0.5em 1em;
	position: absolute;
}
/* posicionar o botão no canto superior direito do container */
.copy-button {
right: 1em;
top: 1em;
}

/* efeito visual do botão ao passar o mouse */
.copy-button:hover {
background-color: #ddd;
}



        </style>
</head>

<body>
<header>
	<h1>Admin</h1>
	<nav>
	<a href="logout.php">Logout</a>
		</form>
	</nav>
</header>
	<main>
		<h2>Administração</h2>
			<nav>
				<ul>
        <li><a href="adminusuarios.php" class="button">Utilizadores</a></li>
		<br><br>
        <li><a href="produtos.php" class="button">Produtos</a></li>
		<br><br>
		<li><a href="addlojas.php" class="button">lojas</a></li>
				</ul>
			</nav>
		<p>pagina main do admin</p>
	</main>

	<footer>
		<p>Todos os direitos reservados.</p>
	</footer>
</body>
</html>
