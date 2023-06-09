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

    // Consulta para recuperar os detalhes do usuário com base no ID
    $sql = "SELECT nome, email FROM usuarios WHERE id = $user_id";
    $resultado = mysqli_query($conn, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        // Exibir os detalhes do usuário
        $row = mysqli_fetch_assoc($resultado);
        ?>
        <!DOCTYPE html>
        <html>
        <head>
          <title>Detalhes do Usuário</title>
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

            .edit-btn {
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

            .edit-btn:hover {
              background-color: #ff3333;
            }
          </style>
        </head>
        <body>
          <div class="user-details">
            <h2>Detalhes do Usuário</h2>
            <p><strong>Nome:</strong> <?php echo $row['nome']; ?></p>
            <br>
            <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
            <br>
            <a href="editar_detalhes.php" class="edit-btn">Editar informações</a>
            <br><br>
             <a href="index.php" class="edit-btn">Voltar para o home</a>
            <br><br>
           <a href="primeira_pagina.html" class="edit-btn">Logout</a>
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


