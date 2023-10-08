<?php


include("./verificaradm.php");

?> 
 <!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
	<title>Adicionar loja</title>
</head>
<body>
	<h1>Adicionar loja</h1>
    <a href="pagina_de_admin.php" class="btn-voltar">Voltar para a admin page</a>
<!-- HTML -->
<form method="post" action="adicionar_loja.php">
  <label for="nome">Nome da loja:</label>
  <input type="text" name="nome" id="nome"><br>
  
  <label for="endereco">Endereço:</label>
  <input type="text" name="endereco" id="endereco"><br>
  
  <label for="cidade">Cidade:</label>
  <input type="text" name="cidade" id="cidade"><br>
  
  <label for="codigo_postal">Código postal:</label>
  <input type="text" name="codigo_postal" id="codigo_postal"><br>
  
  <label for="telefone">Telefone:</label>
  <input type="text" name="telefone" id="telefone"><br>
  
  <h2>Produtos disponíveis:</h2>
  <?php
    // Conectar ao banco de dados
    $conexao = mysqli_connect("localhost", "id20757658_miguelgaitas", "MiguelGaitas24.", "id20757658_dados_dos_registros");
    
    // Selecionar todos os produtos
    $query = "SELECT * FROM produtos";
    $resultado = mysqli_query($conexao, $query);
    
    // Exibir checkboxes para cada produto
    while ($produto = mysqli_fetch_assoc($resultado)) {
      echo '<label>';
      echo '<input type="checkbox" name="produtos[]" value="' . $produto['id'] . '"> ';
      echo $produto['nome'] . ' - €' . number_format($produto['preco'], 2, ',', '.');
      echo '</label><br>';
    }
  ?>
  
  <input type="submit" value="Adicionar loja">
</form>
<style> 
/* Definições gerais */
body {
  font-family: Arial, sans-serif;
  font-size: 16px;
  color: #333;
  margin: 0;
  padding: 0;
}

/* Estilo do cabeçalho */
header {
  background-color: #006699;
  color: #fff;
  padding: 20px;
}

header h1 {
  margin: 0;
}

/* Estilo do menu */
nav {
  background-color: #eee;
  padding: 10px;
  margin-bottom: 20px;
}

nav ul {
  list-style: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin-right: 10px;
}

nav a {
  display: block;
  padding: 10px;
  text-decoration: none;
  color: #333;
}

nav a:hover {
  background-color: #ddd;
}

/* Estilo do conteúdo */
section {
  margin: 20px;
}

section h2 {
  font-size: 24px;
  margin: 0 0 20px;
}

/* Estilo do formulário */
form {
  max-width: 600px;
  margin: 0 auto;
}

form label {
  display: block;
  margin-bottom: 10px;
  font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form textarea {
  display: block;
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  margin-bottom: 20px;
  font-size: 16px;
}

form textarea {
  height: 200px;
}

form input[type="submit"] {
  background-color: #006699;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
  font-size: 16px;
}

form input[type="submit"]:hover {
  background-color: #004466;
}

/* Estilo das tabelas */
table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 10px;
  border: 1px solid #ccc;
}

table th {
  background-color: #eee;
  font-weight: bold;
  text-align: left;
}

/* Estilo das mensagens de erro e sucesso */
.message {
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 3px;
  font-weight: bold;
}

.message.error {
  background-color: #ffcccc;
  color: #990000;
}

.message.success {
  background-color: #ccffcc;
  color: #006600;
}
.btn-voltar {
  position: fixed;
  top: 20px;
  right: 20px;
  background-color: #007bff;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.btn-voltar:hover {
  background-color: #0062cc;
}



</style>

<h1>Lista de lojas</h1>

	<table>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Endereço</th>
				<th>Cidade</th>
				<th>Código postal</th>
				<th>Telefone</th>
				<th>Produtos disponíveis</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// Conectar ao banco de dados
				$conexao = mysqli_connect("localhost", "id20757658_miguelgaitas", "MiguelGaitas24.", "id20757658_dados_dos_registros");

				// Selecionar todas as lojas
				$query = "SELECT * FROM lojas";
				$resultado = mysqli_query($conexao, $query);

				// Exibir as informações de cada loja
				while ($loja = mysqli_fetch_assoc($resultado)) {
					echo '<tr>';
					echo '<td>' . $loja['nome'] . '</td>';
					echo '<td>' . $loja['endereco'] . '</td>';
					echo '<td>' . $loja['cidade'] . '</td>';
					echo '<td>' . $loja['codigo_postal'] . '</td>';
					echo '<td>' . $loja['telefone'] . '</td>';
					echo '<td>';
					// Selecionar os produtos disponíveis na loja atual
					$query_produtos = "SELECT produtos.nome FROM produtos INNER JOIN lojas_produtos ON produtos.id = lojas_produtos.produto_id WHERE lojas_produtos.loja_id = " . $loja['id'];
					$resultado_produtos = mysqli_query($conexao, $query_produtos);
					// Exibir os nomes dos produtos separados por vírgula
					while ($produto = mysqli_fetch_assoc($resultado_produtos)) {
						echo $produto['nome'] . ', ';
					}
					echo '</td>';
					echo '<td><a href="editar_loja.php?id=' . $loja['id'] . '">Editar</a></td>';
					echo '</tr>';
				}

				// Fechar a conexão com o banco de dados
				mysqli_close($conexao);
			?>
                

		</tbody>
	</table>
    
</body>
</html>

</body>
</html>
