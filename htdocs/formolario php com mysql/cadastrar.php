<?php
// Conectar ao banco de dados
$host = "localhost";
$user = "bruno";
$password = "12345";
$database = "usuarios";

$conn = mysqli_connect($host, $user, $password, $database);

// Verificar a conexão
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Obter os dados do formulário
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	// Executar uma consulta INSERT para inserir os dados na tabela
	$sql = "INSERT INTO dados_usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
	if (mysqli_query($conn, $sql)) {
	    echo "Cadastro realizado com sucesso!";
	} else {
	    echo "Erro ao cadastrar: " . mysqli_error($conn);
	}
}

// Fechar a conexão
mysqli_close($conn);
?>
