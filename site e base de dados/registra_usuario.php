<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "MiguelGaitas";
	$password = "Comida24.";
	$dbname = "dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificação da conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Processamento dos dados do formulário de registro
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Inserção dos dados na tabela de usuários
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', PASSWORD('$senha'));
";

if (mysqli_query($conn, $sql)) {
    // Exibe uma mensagem de registro bem-sucedido em um pop-up
    echo "<script>alert('Registro bem-sucedido!'); window.location.href = 'login.php';</script>";
} else {
    echo "Erro ao registrar o usuário: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
