<?php


include("./verificaradm.php");

?>
<!DOCTYPE html>
<html lang="pt">

<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<style>
		/* Estilos gerais */
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
		}

		header {
			background-color: #333;
			color: #fff;
			text-align: center;
			padding: 20px;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}

		h1 {
			font-size: 24px;
		}

		section {
			display: flex;
			justify-content: space-around;
			flex-wrap: wrap;
			margin-top: 20px;
		}

		.box {
			background-color: #fff;
			border: 1px solid #ccc;
			padding: 20px;
			text-align: center;
			border-radius: 5px;
			margin: 10px;
			width: 30%;
			box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
		}

		.button-container {
			text-align: center;
			margin-top: 20px;
		}

		.button {
			display: inline-block;
			padding: 10px 20px;
			background-color: #333;
			color: #fff;
			text-decoration: none;
			border-radius: 5px;
			margin-right: 10px;
			transition: background-color 0.3s;
		}

		.button:hover {
			background-color: #555;
		}
	</style>
</head>

<body>
	<header>
		<h1>Dashboard</h1>
		<a href="detalhesconta.php" class="round-button">
		  <span>Detalhes da Conta</span>
		</a>
	</header>
	<div class="container">
	<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

// Crie uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para obter o número total de usuários
$sqlUsuarios = "SELECT COUNT(*) AS totalUsuarios FROM usuarios";
$resultUsuarios = $conn->query($sqlUsuarios);

if ($resultUsuarios->num_rows > 0) {
    $rowUsuarios = $resultUsuarios->fetch_assoc();
    $totalUsuarios = $rowUsuarios["totalUsuarios"];
} else {
    $totalUsuarios = 0;
}

// Consulta para obter o número total de projetos
$sqlProjetos = "SELECT COUNT(*) AS totalProjetos FROM projetos_arduino";
$resultProjetos = $conn->query($sqlProjetos);

if ($resultProjetos->num_rows > 0) {
    $rowProjetos = $resultProjetos->fetch_assoc();
    $totalProjetos = $rowProjetos["totalProjetos"];
} else {
    $totalProjetos = 0;
}

$conn->close();
?>



		<section>
			<div class="box">
				<h3>Utilizadores no Site</h3>
				<p>
					<?php echo $totalUsuarios; ?>
				</p>
			</div>
			<div class="box">
				<h3>Total de Projetos</h3>
				<p>
					<?php echo $totalProjetos; ?>
				</p>
			</div>
		</section>

		<div class="button-container">
			<a href="adminusuarios.php" class="button">Utilizadores</a>
			<a href="produtos.php" class="button">Produtos</a>
			<a href="addlojas.php" class="button">lojas</a>
			<a href="addprojetosarduino.php" class="button">Projetos Arduino</a>
			<a href="primeira_pagina.php" class="button">Home page</a>
			<a href="projetos_pendentes.php" class="button">verificar projetos</a>
		</div>
	</div>
</body>

</html>