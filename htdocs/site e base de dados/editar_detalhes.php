<?php
// Início da sessão
session_start();

// Verificação se o usuário está conectado
if (isset($_SESSION['id_usuario'])) {
    // Conecte-se ao banco de dados
    $servername = "localhost";
    $username = "MiguelGaitas";
    $password = "Comida24.";
    $dbname = "dados_dos_registros";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    // Recuperar o ID do usuário da sessão
    $user_id = $_SESSION['id_usuario'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obter informações do usuário
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $oldpass = md5($_POST['oldpass']);
        $senha = md5($_POST['senha']);

        if (isset($oldpass)){
          $query = "SELECT senha FROM usuarios where id = $user_id";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $oldpwd = $row['senha'];

            if ($oldpwd == $oldpass){
              // Atualizar as informações do usuário
              $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $user_id";

              if (mysqli_query($conn, $sql)) {
                  echo "Informações atualizadas com sucesso!";
              } else {
                  echo "Erro ao atualizar as informações: " . mysqli_error($conn);
              }
            }

          }

        }

        
    }

    // Consulta para recuperar os detalhes do usuário com base no ID
    $sql = "SELECT nome, email FROM usuarios WHERE id = $user_id";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // Exibir o formulário de edição do usuário
        $row = mysqli_fetch_assoc($resultado);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Editar Usuário</title>
          <style>
            body {
              font-family: Arial, sans-serif;
            }

            .user-details {
              max-width: 300px;
              margin: 20px auto;
              padding: 20px;
              border: 1px solid #ccc;
              border-radius: 5px;
            }

            .user-details h2 {
              margin-top: 0;
            }

            .user-details p {
              margin: 10px 0;
            }

            .back-btn {
              display: inline-block;
              padding: 8px 16px;
              background-color: #e60000;
              color: #fff;
              border: none;
              border-radius: 4px;
              cursor: pointer;
              text-decoration: none;
              font-size: 14px;
            }

            .back-btn:hover {
              background-color: #ff3333;
            }
          </style>
        </head>
        <body>
          <div class="user-details">
            <h2>Editar Usuário</h2>
            <form method="POST" action="">
              <p><strong>Nome:</strong> <input type="text" name="nome" value="<?php echo $row['nome']; ?>"></p>
              <br>
              <p><strong>Email:</strong> <input type="email" name="email" value="<?php echo $row['email']; ?>"></p>
              <br>
              <p><strong>Senha antiga:</strong> <input type="password" name="oldpass"></p>
              <br>
              <p><strong>Nova senha:</strong> <input type="password" name="senha"></p>
              <br><br>
              <input type="submit" value="Atualizar" class="back-btn">
            </form>
            <br>
            <a href="login.php" class="back-btn">Voltar para Login</a>
            <br><br>
            <a href="detalhesconta.php" class="back-btn">cancelar</a>
          </div>
</body>
</html>
<?php
} else {
    echo "Nenhum usuário encontrado com o ID fornecido.";
}
mysqli_close($conn);
} else {
    echo "Usuário não está conectado.";
}
?>

