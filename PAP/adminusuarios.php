<?php


include("./verificaradm.php");

?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
	<title>Gerenciamento de Usuários</title>
	<link rel="stylesheet" type="text/css" href="adminusuarios.css">
</head>
<body>
	<div class="container">
		<h1>Gerenciamento de Utilizadores</h1>
		<a href="pagina_de_admin.php" class="btn">Voltar</a>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>E-mail</th>
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

					// Seleciona todos os usuários da base de dados
					$sql = "SELECT id, nome, email FROM usuarios";
					$resultado = mysqli_query($conn, $sql);

					// Loop através de todos os usuários e exibe suas informações em uma tabela
					while ($linha = mysqli_fetch_assoc($resultado)) {
					    echo "<tr>";
					    echo "<td>" . $linha['id'] . "</td>";
					    echo "<td>" . $linha['nome'] . "</td>";
					    echo "<td>" . $linha['email'] . "</td>";
					    echo "<td>";
					    echo "<a href='editarusuario.php?id=" . $linha['id'] . "'>Editar</a> | ";
					    echo "<a href='excluirusuario.php?id=" . $linha['id'] . "'>Excluir</a>";
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
