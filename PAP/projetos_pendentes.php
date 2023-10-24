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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
        }

        li {
            background-color: #fff;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: calc(33.33% - 20px);
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: #333;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            text-align: center;
            font-weight: bold;
        }

        .admin-button {
            text-align: center;
            margin: 20px;
        }

        .admin-button a {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .admin-button a:hover {
            background-color: #555;
        }
    </style>
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
    <div class="admin-button">
        <a href="pagina_de_admin.php">Página de Administração</a>
    </div>
</body>
</html>

<?php
// Feche a conexão com o banco de dados
$conn->close();
?>
