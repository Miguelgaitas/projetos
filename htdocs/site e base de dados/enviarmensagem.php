<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "MiguelGaitas";
$password = "Comida24.";
$dbname = "dados_dos_registros";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Limpa as variáveis do formulário
	$nome = htmlspecialchars($_POST['nome']);
	$email = htmlspecialchars($_POST['email']);
	$mensagem = htmlspecialchars($_POST['mensagem']);

	// Insere a mensagem na tabela do banco de dados
	$sql = "INSERT INTO mensagens (nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
	if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Mensagem enviada com sucesso!');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
	} else {
        echo "<script>alert('Mensagem nao enviada!!!');</script>";
        echo "<script>window.location.href = 'contact.php';</script>";
        exit();
	}
}
?>
