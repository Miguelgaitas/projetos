
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
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

  <form action="adicionar_projeto_comunitario.php" method="POST" enctype="multipart/form-data">
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
  <?php
session_start();

// Verifique se o usuário está autenticado (por exemplo, usando algum outro mecanismo de autenticação)
if (!isset($_SESSION['id_usuario'])) {
    die("Você não está autenticado.");
}

$usuarioLogadoId = $_SESSION['id_usuario'];

$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "SELECT * FROM projetos_arduino WHERE autor = $usuarioLogadoId";
$result = $conn->query($sql);

echo "<h1>Seus Projetos Arduino</h1>";
echo "<table>";
echo "<tr>";
echo "<th>Nome do Projeto</th>";
echo "<th>Descrição</th>";
echo "<th>Imagem</th>";
echo "<th>Código</th>";
echo "<th>Simulação</th>";
echo "<th>Tempo Restante</th>"; // Coluna para exibir o tempo restante
echo "<th>Ações</th>"; // Coluna para exibir o botão de edição
echo "</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['nome'] . "</td>";
    echo "<td>" . $row['descricao'] . "</td>";
    echo "<td class='img-cell'><img src='./imagens/" . $row['imagem'] . "' alt='Imagem do Projeto'></td>";
    echo "<td>" . $row['codigo'] . "</td>";
    echo "<td>" . $row['simula'] . "</td>";
    
    if ($row['status'] == 'verificado') {
        $tempoRestante = "Projeto verificado, sem edição permitida";
        $acoes = "";
    } elseif ($row['status'] == 'rejeitado') {
        $prazoEdicao = strtotime($row['prazo_edicao']);
        $tempoRestanteSegundos = $prazoEdicao - time(); // Diferença em segundos

        if ($tempoRestanteSegundos > 0) {
            $dias = floor($tempoRestanteSegundos / (60 * 60 * 24));
            $horas = floor(($tempoRestanteSegundos - ($dias * 60 * 60 * 24)) / (60 * 60));
            $minutos = floor(($tempoRestanteSegundos - ($dias * 60 * 60 * 24) - ($horas * 60 * 60)) / 60);
            $segundos = $tempoRestanteSegundos % 60;

            $tempoRestante = "Projeto Rejeitado tem agora : $dias dias, $horas horas, $minutos minutos e $segundos segundos para editar o projeto se nao ele ficara expirado e nao podera mais fazer a ediçao ";
            $acoes = "<a href='editar_projeto_comunitario.php?id=" . $row['id'] . "'>Editar</a>";
        } else {
            $tempoRestante = "Tempo para edição esgotado";
            $acoes = "";
        }
    } else {
        $tempoRestante = "Projeto em estado indefinido";
        $acoes = "";
    }

    echo "<td>$tempoRestante</td>";
    echo "<td>$acoes</td>";
    echo "</tr>";
}

echo "</table>";
?>




</table>

  
</body>
</html>