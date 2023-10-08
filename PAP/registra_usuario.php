<?php
// Início da sessão
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);
$confirmarSenha = md5($_POST['confirm_senha']);

// Verificar se o usuário já está registrado
$sqlVerificar = "SELECT id FROM usuarios WHERE email = '$email';";
$resultadoVerificar = mysqli_query($conn, $sqlVerificar);

if (mysqli_num_rows($resultadoVerificar) > 0) {
    mysqli_close($conn);
    
    // Redirecionar para a página de registro com a mensagem de e-mail já registrado
   $mensagem = "Este e-mail já está registrado.";
   $redirecionarPara = "registro.php?mensagem=" . urlencode($mensagem); 
    
   
    header("Location: $redirecionarPara");
    exit;
} else {
    // Verificar se a senha e a confirmação de senha coincidem
    if ($senha !== $confirmarSenha) {
        mysqli_close($conn);

        // Redirecionar de volta para a página de registro com uma mensagem de erro
        $mensagem = "As senhas não coincidem. Tente novamente.";
        $redirecionarPara = "registro.php?mensagem=" . urlencode($mensagem);

        header("Location: $redirecionarPara");
        exit;
    }

    // Inserir os dados na tabela de usuários
    $sqlInserir = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha');";

    if (mysqli_query($conn, $sqlInserir)) {
        mysqli_close($conn);

        // Redirecionar para a página de login com a mensagem de registro bem-sucedido
         $mensagem = "Registro bem-sucedido! Faça login para continuar.";
         $redirecionarPara = "login.php?mensagem=" . urlencode($mensagem);
       
        
        header("Location: $redirecionarPara");
        exit;
    } else {
        echo "Erro ao registrar o usuário: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
