<?php
session_start();
include("conexao.php"); // Conexão com o banco de dados

$email = $_POST['email'];

// Verifique se o e-mail existe no banco de dados
$sql = "SELECT id, nome FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $row = mysqli_fetch_assoc($resultado);
    $usuario_id = $row['id'];
    $nomeUsuario = $row['nome'];

    // Crie um token de redefinição de senha
    $token = bin2hex(random_bytes(32)); // Gere um token aleatório
    $expiracao = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token expira em 1 hora

    // Insira o token no banco de dados
    $sql = "INSERT INTO tokens_reset_senha (usuario_id, token, expiracao) VALUES ($usuario_id, '$token', '$expiracao')";
    mysqli_query($conexao, $sql);

    // Configuração de envio de e-mail
    ini_set("SMTP", "localhost");
    ini_set("smtp_port", 1025);
    ini_set("sendmail_from", "arduinocodemasters@gmail.com");

    // Envie um e-mail com um link de redefinição de senha
    $assunto = "Redefinição de Senha";
    $mensagem = "Olá $nomeUsuario,\n\n";
    $mensagem .= "Você solicitou uma redefinição de senha. Clique no link abaixo para redefinir sua senha:\n\n";
    $mensagem .= "http://localhost/PAP/reset_password.php?token=$token\n\n";
    $mensagem .= "Se você não solicitou esta redefinição, ignore este e-mail.\n";

    mail($email, $assunto, $mensagem);

    $_SESSION['mensagem'] = "E-mail de redefinição de senha enviado com sucesso!";
} else {
    $_SESSION['mensagem'] = "E-mail não encontrado em nossa base de dados.";
}

header("Location: forgot_password.php");
?>
