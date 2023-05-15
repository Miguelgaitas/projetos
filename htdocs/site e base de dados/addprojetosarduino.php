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
// Consulta os projetos existentes
$sql = "SELECT * FROM projetos_arduino";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

h1, h2 {
  margin: 20px 0;
}

form {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

input[type="text"],
textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
}

input[type="file"] {
  margin-bottom: 10px;
}

input[type="submit"] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor: pointer;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
}

img {
  max-width: 100px;
  max-height: 100px;
}

a {
  color: #4CAF50;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
 /* Estilo para a célula da imagem */
 td.img-cell {
      text-align: center;
    }
    
    td.img-cell img {
      max-width: 100px;
      max-height: 100px;
    }

  </style>
  <title>Formulário de Projetos Arduino</title>
</head>
<body>
  <h1>Adicionar Projeto Arduino</h1>

  <form action="adicionar_projeto.php" method="POST" enctype="multipart/form-data">
    <label for="nome">Nome do Projeto:</label>
    <input type="text" id="nome" name="nome" required><br><br>

    <label for="descricao">Descrição:</label><br>
    <textarea id="descricao" name="descricao" required></textarea><br><br>

    <label for="imagem">Imagem:</label>
    <input type="file" id="imagem" name="imagem" required><br><br>

    <label for="codigo">Código:</label><br>
    <textarea id="codigo" name="codigo" required></textarea><br><br>

    <label for="simula">simulaçao:</label><br>
    <textarea id="simula" name="simula" required></textarea><br><br>

    <input type="submit" value="Adicionar Projeto">
  </form>
 

  <h2>Projetos Arduino Existentes</h2>
  <table>
    <tr>
      <th>Nome</th>
      <th>Descrição</th>
      <th>Imagem</th>
      <th>Código</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['nome']."</td>";
        echo "<td>".$row['descricao']."</td>";
       echo "<td class='img-cell'>".basename($row['imagem'])."</td>";
        echo "<td>".$row['codigo']."</td>";
        echo "<td>".$row['simula']."</td>";
        echo "<td><a href='editar_projeto.php?id=".$row['id']."'>Editar</a></td>";
        echo "<td><a href='excluir_projeto.php?id=".$row['id']."'>Excluir</a></td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='6'>Nenhum projeto encontrado.</td></tr>";
    }
    ?>
  </table>
  
</body>
</html>
