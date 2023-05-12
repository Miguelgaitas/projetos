<?php


include("./verificaradm.php");

?>
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

// Obtém os dados do formulário
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['name'];
$codigo = $_POST['codigo'];

// Move a imagem para um diretório do servidor
$targetDir = "C:\\xampp\\htdocs\\site e base de dados\\imagens\\";
$targetFile = $targetDir . basename($_FILES['imagem']['name']);
if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
  echo "Imagem enviada com sucesso!<br>";
} else {
  echo "Erro ao enviar a imagem.<br>";
}

// Insere os dados na tabela do banco de dados
$sql = "INSERT INTO projetos_arduino (nome, descricao, imagem, codigo) VALUES ('$nome', '$descricao', '$imagem', '$codigo')";

if ($conn->query($sql) === TRUE) {
  echo "Projeto adicionado com sucesso!";
} else {
  echo "Erro ao adicionar o projeto: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<a href="pagina_de_admin.php" style="text-decoration: none;">
    <button type="button" style="padding: 10px 20px; font-size: 16px;">Voltar</button>