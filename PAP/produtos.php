<?php


include("./verificaradm.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
	<title>Gerenciamento de Produtos</title>
	<link rel="stylesheet" type="text/css" href="adminprodutos.css">
</head>
<body>
	<div class="container">
		<h1>Gerenciamento de Produtos</h1>
		<a href="pagina_de_admin.php" class="btn">Voltar</a>

		<h2>Adicionar Produto</h2>
		<form method="post" action="adicionarproduto.php">
			<label for="nome">Nome:</label>
			<input type="text" id="nome" name="nome" required>

			<label for="descricao">Descrição:</label>
			<textarea id="descricao" name="descricao" required></textarea>

			<label for="preco">Preço:</label>
			<input type="number" id="preco" name="preco" min="0" step="0.01" required>

			<label for="quantidade">Quantidade em Stock:</label>
			<input type="number" id="quantidade" name="quantidade" min="0" required>
			<label for="link">Link:</label>
<input type="text" id="link" name="link">


			<input type="submit" value="Adicionar" class="btn">
            
		</form>

		<hr>

		<h2>Produtos Existentes</h2>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Descrição</th>
					<th>Preço</th>
					<th>Quantidade em Stock</th>
					<th>Link para o produto</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
			<?php
        // Conexão com a base de dados
		$servername = "localhost";
		$username = "id20757658_miguelgaitas";
		$password = "MiguelGaitas24.";
		$dbname = "id20757658_dados_dos_registros";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
        }

        // Seleciona todos os produtos da base de dados
        $sql = "SELECT * FROM produtos";
        $resultado = mysqli_query($conn, $sql);

        // Loop através de todos os produtos e exibe suas informações em uma tabela
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha['id'] . "</td>";
            echo "<td>" . $linha['nome'] . "</td>";
            echo "<td>" . $linha['descricao'] . "</td>";
            echo "<td>€" . number_format($linha['preco'], 2, ',', '.') . "</td>";
            echo "<td>" . $linha['quantidade_em_stock'] . "</td>";
            echo "<td><a href='" . $linha['link'] . "'>Link para o Produto</a></td>";
            echo "<td>";
            echo "<a href='editarproduto.php?id=" . $linha['id'] . "'>Editar</a> | ";
            echo "<a href='excluirproduto.php?id=" . $linha['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir este produto?\")'>Excluir</a>";
            echo "</td>";
            echo "</tr>";
        }

        mysqli_close($conn);
    ?>
			</tbody>
		</table>
	</div>
</body>
</html>
