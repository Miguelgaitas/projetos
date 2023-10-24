<?php
session_start();
include("conexao.php"); // Conexão com o banco de dados

if (isset($_POST['senha'])) {
    $nova_senha = md5($_POST['senha']); // Aplica MD5 à nova senha
    $confirmarSenha = md5($_POST['confirm_senha']);
    $token = $_POST['token'];
    if ($nova_senha !== $confirmarSenha) {
        echo "Passwords não coincidem";
        echo "<script>alert('senhas não coincidem')</script>";
        echo "<script>window.location.href='reset_password.php?token=$token'</script>";
        return;
    }
    // Verifique se o token está válido e não expirou
    $sql = "SELECT usuario_id FROM tokens_reset_senha WHERE token = '$token' AND expiracao > NOW()";
    $resultado = mysqli_query($conexao, $sql);
    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $row = mysqli_fetch_assoc($resultado);
        $usuario_id = $row['usuario_id'];
        // Atualize a senha do usuário no banco de dados com a nova senha
        $sql = "UPDATE usuarios SET senha = '$nova_senha' WHERE id = $usuario_id";
        if (mysqli_query($conexao, $sql)) {
            // Remova o token após a atualização da senha
            $sql = "DELETE FROM tokens_reset_senha WHERE token = '$token'";
            mysqli_query($conexao, $sql);
            $_SESSION['mensagem'] = "Senha atualizada com sucesso!";
        } else {
            $_SESSION['mensagem'] = "Erro ao atualizar a senha: " . mysqli_error($conexao);
            return;
        }
    } else {
        $_SESSION['mensagem'] = "Token de redefinição de senha inválido ou expirado.";
        return;
    }
} else {
    $_SESSION['mensagem'] = "Senha não especificada.";
    return;
}

header("Location: login.php"); // Redireciona para a página de login após a atualização da senha

?>