<!DOCTYPE html>
<html>
<head>
	<title>Lojas</title>
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
			border: 1px solid #ddd;
		}
		th {
			background-color: #4CAF50;
			color: white;
		}
		tr:nth-child(even) {
			background-color: #f2f2f2;
		}
		.button {
			background-color: #4CAF50;
			color: white;
			border: none;
			padding: 10px 20px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
			position: absolute;
			top: 20px;
			right: 20px;
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
		<h1>Lojas</h1>
		<nav>
			<a href="index.php">Home</a>
			<a href="pagina1.php">Projetos</a>
			<a href="pagina2.php">Produtos</a>
			<a href="detalhesconta.php" class="round-button">
  <span>Detalhes da Conta</span>
</a>
            

        </nav>
	</header>

	<main>
	<h1>Tabela de lojas e produtos</h1>

<!-- Tabela de lojas e produtos -->
<table>
	<thead>
		<tr>
			<th>Nome da loja</th>
			<th>Endereço</th>
			<th>Cidade</th>
			<th>Código postal</th>
			<th>Telefone</th>
			<th>Produtos disponíveis</th>
		</tr>
	</thead>
	<tbody>
		<?php
			// Conectar ao banco de dados
			$conexao = mysqli_connect("localhost", "MiguelGaitas", "Comida24.", "dados_dos_registros");

			// Selecionar todas as lojas
			$query_lojas = "SELECT * FROM lojas";
			$resultado_lojas = mysqli_query($conexao, $query_lojas);

			// Loop através das lojas
			while ($loja = mysqli_fetch_assoc($resultado_lojas)) {
				echo '<tr>';
				echo '<td>' . $loja['nome'] . '</td>';
				echo '<td>' . $loja['endereco'] . '</td>';
				echo '<td>' . $loja['cidade'] . '</td>';
				echo '<td>' . $loja['codigo_postal'] . '</td>';
				echo '<td>' . $loja['telefone'] . '</td>';

				// Selecionar os produtos disponíveis na loja atual
				$query_produtos_loja = "SELECT produto_id FROM lojas_produtos WHERE loja_id = " . $loja['id'];
				$resultado_produtos_loja = mysqli_query($conexao, $query_produtos_loja);

				// Loop através dos produtos disponíveis na loja atual
				$produtos = array();
				while ($produto_loja = mysqli_fetch_assoc($resultado_produtos_loja)) {
					$query_produto = "SELECT * FROM produtos WHERE id = " . $produto_loja['produto_id'];
					$resultado_produto = mysqli_query($conexao, $query_produto);
					$produto = mysqli_fetch_assoc($resultado_produto);
					$produtos[] = $produto['nome'];
				}

				echo '<td>' . implode(', ', $produtos) . '</td>';
				echo '</tr>';
			}

			// Fechar a conexão com o banco de dados
			mysqli_close($conexao);
		?>
	</tbody>
</table>
</body>
</html>
		<button id="voltar-ao-topo" onclick="topFunction()">Voltar ao topo</button>
	</main>

	<footer>
		<p>&copy; 2023, Todos os direitos reservados.</p>
	</footer>
</body>
</html>
