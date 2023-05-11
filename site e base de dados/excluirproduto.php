<?php
// Conexão com a base de dados
$servername = "localhost";
$username = "MiguelGaitas";
$password = "Comida24.";
$dbname = "dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica se a conexão foi estabelecida com sucesso
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se foi fornecido um ID válido do produto a ser excluído
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: produtos.php?erro=ID inválido');
    exit();
}

// Recebe o ID do produto a ser excluído por meio da variável $_GET
$id = $_GET['id'];

// Prepara a consulta SQL para excluir o produto
$sql = "DELETE FROM produtos WHERE id = $id";

// Executa a consulta SQL
if (mysqli_query($conn, $sql)) {
    // Redireciona para a página de listagem de produtos com uma mensagem de sucesso
    header('Location: produtos.php?sucesso=Produto excluído com sucesso');
    exit();
} else {
    // Redireciona para a página de listagem de produtos com uma mensagem de erro
    header('Location: produtos.php?erro=Erro ao excluir o produto');
    exit();
}

// Fecha a conexão com a base de dados
mysqli_close($conn);
?>
