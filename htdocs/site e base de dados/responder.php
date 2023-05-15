<?php
include("./verificaradm.php");
// Configurações do banco de dados
$servername = "localhost";
$username = "MiguelGaitas";
$password = "Comida24.";
$dbname = "dados_dos_registros";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Recupera as mensagens da tabela "mensagens"
$sql = "SELECT * FROM mensagens";
$result = $conn->query($sql);

// Exibe as mensagens
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nome = $row['nome'];
        $email = $row['email'];
        $mensagem = $row['mensagem'];
        $respondida = $row['respondida'];

        echo "<div class='mensagem'>
                <h3>De: $nome</h3>
                <p>Email: $email</p>
                <p>Mensagem: $mensagem</p>";

        // Verifica se a mensagem foi respondida
        if ($respondida) {
            echo "<p class='respondida'>Respondida</p>";
        } else {
            echo "<p class='nao-respondida'>Não Respondida</p>";
            echo "<form action='enviar_resposta.php' method='POST'>
                    <input type='hidden' name='id' value='$id'>
                    <label for='assunto'>Assunto:</label>
                    <input type='text' name='assunto' id='assunto'>
                    <label for='resposta'>Resposta:</label>
                    <textarea name='resposta' id='resposta'></textarea>
                    <button type='submit' class='btn'>Responder</button>
                  </form>";
        }

        echo "</div>";
    }
} else {
    echo "Nenhuma mensagem encontrada.";
}

$conn->close();
?>
