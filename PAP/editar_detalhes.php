<?php
// Início da sessão
session_start();

// Verificação se o usuário está conectado
if (isset($_SESSION['id_usuario'])) {
  // Conecte-se ao banco de dados
  $servername = "localhost";
  $username = "id20757658_miguelgaitas";
  $password = "MiguelGaitas24.";
  $dbname = "id20757658_dados_dos_registros";
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

    if (isset($oldpass)) {
      $query = "SELECT senha FROM usuarios where id = $user_id";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $oldpwd = $row['senha'];

        if ($oldpwd == $oldpass) {
          // Atualizar as informações do usuário
          $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha' WHERE id = $user_id";

          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Informações atualizadas com sucesso!'); window.location.href = 'login.php';</script>";
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
    <link rel="icon" href="./imagens/favicon-32x32.png">
      <title>Editar Usuário</title>
      <link rel="stylesheet" href="home.css">
    </head>

    <body>
      <header>
        <h2 class="logo">
          <img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image"
            style="width: 148px; height: auto;">
        </h2>
        <nav class="navigation">
        <button onclick="window.location.href= './detalhesconta.php';" class="btnlogin-popup">Cancelar</button>
        </nav>
      </header>
      <div class="warpper">
        <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
        <div class="form-box login">
          <h2>Editar Utilizador</h2>
          <form method="POST" action="">
            <div class="input-box">
              <span class="icon"><ion-icon name="person-outline"></ion-icon></span>

              <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
              <label>Nome:</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>

              <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
              <label>Email:</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>

              <input type="password" name="oldpass" required>
              <label>Senha antiga:</label>
            </div>
            <div class="input-box">
              <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>

              <input type="password" name="senha" required>
              <label>Nova senha:</label>
            </div>

            <button type="submit" value="atualizar" class="btn">Atualizar</button>

          </form>
        </div>
      </div>
      <script src="script.js"></script>
      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
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