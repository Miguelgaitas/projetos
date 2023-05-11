<?php
$host = "localhost";
$username = "MiguelGaitas";
	$password = "Comida24.";
	$dbname = "dados_dos_registros";

// Cria uma conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>produtos</title>
	<style>
	/* Estilo do corpo da página */
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

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}

	</style>

	<script>
// Quando o usuário rolar 20px para baixo da parte superior da página, mostra o botão
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("voltar-ao-topo").classList.add("show");
  } else {
    document.getElementById("voltar-ao-topo").classList.remove("show");
  }
}

// Quando o usuário clicar no botão, volta para o topo da página
function topFunction() {
  document.body.scrollTop = 0; // Para Safari
  document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE e Opera
}
</script>

</head>
<body>
	<header>
		<h1>Produtos</h1>
		<nav>
			<a href="index.php">Home</a>
			<a href="pagina1.php">Projeto arduino Tres Musicas</a>
			<a href="pagina3.php">Lojas</a>
			<a href="logout.php">Logout</a>
			

		</nav>
	</header>

	<main>
		<p>Produtos ha venda.</p>
		
		<?php
// Recupera os dados da tabela "produtos"
$sql = "SELECT * FROM produtos";
$result = mysqli_query($conn, $sql);

// Exibe os dados em uma tabela HTML
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Nome</th><th>Preço</th><th>descriçao</th><th>quantidade em stock</th><th>link para o produto</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"] . "</td><td>€" . $row["preco"] . "</td><td>" . $row["descricao"] . "</td><td>" . $row["quantidade_em_stock"] ."</td><td><a href='" . $row['link'] . "'>Link para o Produto</a></td></tr>";
    }
    echo "</table>";
} else {
    echo "Não foram encontrados produtos.";
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>

		<button id="voltar-ao-topo" onclick="topFunction()">Voltar ao topo</button>
	</main>

	<footer>
		<p>&copy; 2023, Todos os direitos reservados.</p>
	</footer>
</body>
</html>