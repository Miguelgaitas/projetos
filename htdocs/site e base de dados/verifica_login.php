<?php
// Início da sessão
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "MiguelGaitas";
$password = "Comida24.";
$dbname = "dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$email = $_POST['email'];
$senha = md5($_POST['senha']);

$sql = "SELECT id, nome, admin FROM usuarios WHERE email = '$email' AND senha = '$senha';";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $linha = mysqli_fetch_assoc($resultado);

    // Armazenamento do ID e do nome do usuário na sessão
    $_SESSION['id_usuario'] = $linha['id'];
    $_SESSION['nome_usuario'] = $linha['nome'];

    if ($linha['admin'] == 1) {
        $_SESSION['isAdmin'] = true;
        $mensagem = "Login bem-sucedido! Esta conta é de admin";
        $redirecionarPara = "pagina_de_admin.php";
    } else {
        $_SESSION['isAdmin'] = false;
       
        $redirecionarPara = "index.php"; 
        $mensagem = "Login bem-sucedido!";
    }

    mysqli_close($conn);

    // Redirecionar para a página de destino com a mensagem na URL
    header("Location: $redirecionarPara?mensagem=" . urlencode($mensagem));
    exit;
} else {

    echo "E-mail ou Password esta incorreta" . mysqli_error($conn);
}

mysqli_close($conn);
?>
