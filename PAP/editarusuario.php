<?php
// Conexão com a base de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Verifica se foi passado o ID do usuário
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Seleciona o usuário da base de dados
    $sql = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);

    // Verifica se o usuário foi encontrado
    if (mysqli_num_rows($resultado) > 0) {
        $linha = mysqli_fetch_assoc($resultado);
    } else {
        echo "Usuário não encontrado.";
        exit;
    }
} else {
    echo "ID do usuário não informado.";
    exit;
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];

    // Atualiza os dados do usuário na base de dados
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redireciona de volta para a página de gerenciamento de usuários
    header("Location: adminusuarios.php");
    exit;
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
    <title>Editar Usuário</title>
    <link rel="stylesheet" type="text/css" href="adminusuarios.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuário</h1>
        <form method="post">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo $linha['nome']; ?>"><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" value="<?php echo $linha['email']; ?>"><br>

            <input type="submit" value="Salvar">
        </form>
    </div>
</body>
</html>
