<?php
// Início da sessão
session_start();

// Verificação das credenciais do usuário
$servername = "localhost";
$username = "MiguelGaitas";
$password = "Comida24.";
$dbname = "dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT id, nome, admin FROM usuarios WHERE email = '$email' AND senha = PASSWORD('$senha');
";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $linha = mysqli_fetch_assoc($resultado);

    // Armazenamento do ID e do nome do usuário na sessão
    $_SESSION['id_usuario'] = $linha['id'];
    $_SESSION['nome_usuario'] = $linha['nome'];
    
    if ($linha['admin'] == 1) {
        $_SESSION['isAdmin'] = true;
        // Exibe uma mensagem de login bem-sucedido em um pop-up e redireciona para a página de admin
        echo "<script>alert('Login bem-sucedido!'); window.location.href = 'pagina_de_admin.php';</script>";
        
    } else {
        $_SESSION['isAdmin'] = false;
        // Exibe uma mensagem de login bem-sucedido em um pop-up e redireciona para a página do usuário normal
        echo "<script>alert('Login bem-sucedido!'); window.location.href = 'index.php';</script>";
    }
} else {
    echo "E-mail ou senha inválidos.";
}

mysqli_close($conn);
?>
