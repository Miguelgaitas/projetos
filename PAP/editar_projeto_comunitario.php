
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
  <title>Editar Projeto Arduino</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    h2 {
      margin-top: 20px;
    }

    form {
      margin-top: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    textarea {
      width: 300px;
      padding: 5px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    input[type="file"] {
      margin-top: 5px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
    button{
      padding: 10px 20px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }
  </style>
</head>
<body>
<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o ID do projeto foi passado como parâmetro
if (isset($_GET['id'])) {
    $projetoId = $_GET['id'];

    // Consulta o projeto com base no ID
    $sql = "SELECT * FROM projetos_arduino WHERE id = $projetoId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Exibe o formulário de edição preenchido com os dados do projeto
        echo "<h2>Editar Projeto</h2>";
        echo "<form action='atualizar_projeto_comunitario.php' method='POST' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='projetoId' value='" . $row['id'] . "'>";
        echo "<label for='nome'>Nome do Projeto:</label>";
        echo "<input type='text' id='nome' name='nome' value='" . $row['nome'] . "' required><br><br>";
        echo "<label for='descricao'>Descrição:</label><br>";
        echo "<textarea id='descricao' name='descricao' required>" . $row['descricao'] . "</textarea><br><br>";
        echo "<label for='imagem'>Imagem:</label>";
        echo "<input type='file' id='imagem' name='imagem'><br><br>";
        echo "<label for='codigo'>Código:</label><br>";
        echo "<textarea id='codigo' name='codigo' required>" . $row['codigo'] . "</textarea><br><br>";
        echo "<label for='simula'>simulação:</label><br>";
        echo "<textarea id='simula' name='simula' required>" . $row['simula'] . "</textarea><br><br>";
        echo "<input type='submit' value='Atualizar Projeto'>";
        echo "</form>";
    } else {
        echo "Projeto não encontrado.";
    }
} else {
    echo "ID do projeto não fornecido.";
}
?>

<br><br>
<a href="pagina1.php" style="text-decoration: none;">
    <button type="button">Voltar</button>
</body>
</html>