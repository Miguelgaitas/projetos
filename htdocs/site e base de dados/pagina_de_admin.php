<?php


include("./verificaradm.php");

?>


<!DOCTYPE html>
<html>
<head>

	<title>Meu Site</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

		 body {
			background-image: url(https://c4.wallpaperflare.com/wallpaper/88/22/573/arduino-open-source-wallpaper-preview.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			margin: 0;
			padding: 0;
			font-family: 'Poppins', sans-serif;
		}

		.wrapper {
			margin: 0;
			padding: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			width: 100vw;
			min-height: 100vh;
			background-color: rgba(0, 0, 0, 0.5);
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		nav {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			padding: 20px;
			background-color: #eee;
			border-radius: 10px;
			margin: 20px;
			box-shadow: 0px 0px 10px #888888;
		}

		nav a {
			background-color: #333;
			color: #fff;
			display: inline-block;
			padding: 10px 20px;
			margin: 10px;
			border-radius: 5px;
			text-decoration: none;
			text-transform: uppercase;
			letter-spacing: 2px;
			transition: background-color 0.3s ease;
			box-shadow: 0px 0px 5px #888888;
		}

		nav a:hover {
			background-color: #555;
		}

		h1 {
			font-size: 48px;
			margin-top: 50px;
			text-align: center;
			color: white;
			text-shadow: 1px 1px #fff;
		}

		p {
			font-size: 30px;
			margin-top: 32px;
			text-align: center;
			color: white;
			text-shadow: 1px 1px #fff;
		}

		#voltar-ao-topo {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 20px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: #333;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 10px;
			transition: background-color 0.3s;
		}

		#voltar-ao-topo:hover {
			background-color: #444;
		}
		/* Mostra o botão quando o usuário rolar 20px para baixo da parte superior da página */
		@media screen and (min-height: 600px) {
			#voltar-ao-topo.show {
				display: block;
			}
		}
		.round-button {
  display: inline-block;
  background-color: grey;
  color: white;
  border-radius: 50%;
  padding: 10px 20px;
  text-decoration: none;
  font-size: 16px;
}

.round-button:hover {
  background-color: #45a049;
}



        </style>
</head>

<body>
<header>
	<h1>Admin</h1>
	<nav>
	<a href="detalhesconta.php" class="round-button">
  <span>Detalhes da Conta</span>
</a>
		</form>
	</nav>
</header>
	<main>
		<h2>Administração</h2>
			<nav>
				<ul>
        <li><a href="adminusuarios.php" class="button">Utilizadores</a></li>
		
        <li><a href="produtos.php" class="button">Produtos</a></li>
		
		<li><a href="addlojas.php" class="button">lojas</a></li>
		
		<li><a href="addprojetosarduino.php" class="button">Projetos Arduino</a></li>
		
		<li><a href="index.php" class="button">Home page</a></li>
		
				</ul>
			</nav>
		<p>pagina main do admin</p>
	</main>

	<footer>
		<p>Todos os direitos reservados.</p>
	</footer>
</body>
</html>
