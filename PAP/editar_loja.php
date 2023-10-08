<?php


include("./verificaradm.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
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
  display: inline-block;
  padding: 10px 20px;
  background-color: #3498db;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
  font-size: 16px;
  font-weight: bold;
  margin-top: 20px;
}
.btn-voltar:hover {
  background-color: #2980b9;
}


</style>
	<title>Editar loja</title>
</head>
<body>
	<h1>Editar loja</h1>

	<?php
		// Verificar se o ID da loja foi enviado através da URL
		if (isset($_GET['id'])) {
			// Conectar ao banco de dados
			$conexao = mysqli_connect("localhost", "id20757658_miguelgaitas", "MiguelGaitas24.", "id20757658_dados_dos_registros");

			// Selecionar a loja com base no ID
			$query = "SELECT * FROM lojas WHERE id = " . $_GET['id'];
			$resultado = mysqli_query($conexao, $query);

			// Verificar se a loja foi encontrada
			if (mysqli_num_rows($resultado) == 1) {
				// Exibir o formulário de edição da loja
				$loja = mysqli_fetch_assoc($resultado);
				echo '<form method="POST" action="salvar_loja.php">';
				echo '<input type="hidden" name="id" value="' . $loja['id'] . '">';
				echo '<label>Nome:</label>';
				echo '<input type="text" name="nome" value="' . $loja['nome'] . '"><br>';
				echo '<label>Endereço:</label>';
				echo '<input type="text" name="endereco" value="' . $loja['endereco'] . '"><br>';
				echo '<label>Cidade:</label>';
				echo '<input type="text" name="cidade" value="' . $loja['cidade'] . '"><br>';
				echo '<label>Código postal:</label>';
				echo '<input type="text" name="codigo_postal" value="' . $loja['codigo_postal'] . '"><br>';
				echo '<label>Telefone:</label>';
				echo '<input type="text" name="telefone" value="' . $loja['telefone'] . '"><br>';
				
				// Selecionar todos os produtos disponíveis
				$query_produtos = "SELECT * FROM produtos";
				$resultado_produtos = mysqli_query($conexao, $query_produtos);
				
				// Selecionar os produtos disponíveis na loja atual
				$query_produtos_loja = "SELECT produto_id FROM lojas_produtos WHERE loja_id = " . $loja['id'];
				$resultado_produtos_loja = mysqli_query($conexao, $query_produtos_loja);
				$produtos_loja = array();
				while ($produto_loja = mysqli_fetch_assoc($resultado_produtos_loja)) {
					$produtos_loja[] = $produto_loja['produto_id'];
				}
				
				// Exibir os produtos com checkboxes marcados se já estiverem disponíveis na loja
				echo '<label>Produtos disponíveis:</label><br>';
				while ($produto = mysqli_fetch_assoc($resultado_produtos)) {
					echo '<input type="checkbox" name="produtos[]" value="' . $produto['id'] . '"';
					if (in_array($produto['id'], $produtos_loja)) {
						echo ' checked';
					}
					echo '> ' . $produto['nome'] . ' (' . $produto['quantidade_em_stock'] . ')<br>';
				}
				echo '<br>';
				
				echo '<input type="submit" value="Salvar">';
echo '</form>';
} else {
// Exibir mensagem de erro se a loja não foi encontrada
echo '<p>Loja não encontrada.</p>';
}
} else {
// Exibir mensagem de erro se o ID da loja não foi enviado através da URL
echo '<p>ID da loja não especificado.</p>';
}
?>
<a href="addlojas.php" class="btn-voltar">Voltar para Adicionar Loja</a>

</body>
</html>