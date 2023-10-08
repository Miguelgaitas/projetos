<?php
include("./verificaradm.php");

// Conexão com o banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para recuperar projetos pendentes
$sql = "SELECT * FROM projetos_arduino WHERE status = 'pendente'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Projetos Pendentes</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>
<body>
    <h1>Projetos Pendentes para Verificação</h1>

    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $projetoId = $row["id"];
                $nomeProjeto = $row["nome"];
                $descricaoProjeto = $row["descricao"];

                echo "<li>";
                echo "<a href='verificar_projeto.php?id=$projetoId'>";
                echo "<strong>Nome:</strong> $nomeProjeto<br>";
                
                echo "</a>";
                echo "</li>";
            }
        } else {
            echo "<p>Nenhum projeto pendente para verificação.</p>";
        }
        ?>
    </ul>
</body>
</html>

<?php
// Feche a conexão com o banco de dados
$conn->close();
?>
