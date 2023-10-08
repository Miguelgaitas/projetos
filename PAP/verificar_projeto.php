<?php
include("./verificaradm.php");

// Conexão com o banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verifique se o ID do projeto foi passado via GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $projetoId = $_GET['id'];

    // Consulta para recuperar informações do projeto específico
    $sql = "SELECT * FROM projetos_arduino WHERE id = $projetoId";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $descricao = $row["descricao"];
        $imagem = $row["imagem"];
        $simulacao = $row["simula"];
        $codigo = $row["codigo"];
        // Adicione outras informações relevantes aqui

        // Verifique se a ação (verificar ou rejeitar) foi passada via GET
        if (isset($_GET['acao'])) {
            $acao = $_GET['acao'];

            if ($acao === "verificar") {
                // Atualize o status para "verificado"
                $atualizarSql = "UPDATE projetos_arduino SET status = 'verificado' WHERE id = $projetoId";
                if ($conn->query($atualizarSql) === TRUE) {
                    echo "Projeto '$nome' verificado com sucesso!";
                } else {
                    echo "Erro ao verificar o projeto: " . $conn->error;
                }
            } elseif ($acao === "rejeitar") {
                // Exclua o projeto da base de dados
                $excluirSql = "DELETE FROM projetos_arduino WHERE id = $projetoId";
                if ($conn->query($excluirSql) === TRUE) {
                    echo "Projeto '$nome' rejeitado e excluído com sucesso!";
                } else {
                    echo "Erro ao rejeitar o projeto: " . $conn->error;
                }
            }
        }
    } else {
        echo "Projeto não encontrado.";
    }
} else {
    echo "ID do projeto inválido.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verificar Projeto</title>
    <!-- Adicione seus estilos CSS aqui -->
</head>
<body>
    <h1>Detalhes do Projeto</h1>
    
    <p><strong>Nome:</strong> <?php echo isset($nome) ? $nome : ''; ?></p>
    <p><strong>Descrição:</strong> <?php echo isset($descricao) ? $descricao : ''; ?></p>
    <p><strong>Imagem:</strong> <img src='./imagens/<?php echo isset($imagem) ? $imagem : ''; ?>' width='100px'></p>
    <p><strong>Simulação:</strong> <?php echo isset($simulacao) ? $simulacao : ''; ?></p>
    <p><strong>Código:</strong> <?php echo isset($codigo) ? $codigo : ''; ?></p>
    
    <h2>Ações</h2>
    <p><a href="verificar_projeto.php?id=<?php echo $projetoId; ?>&acao=verificar">Verificar Projeto</a></p>
    <p><a href="verificar_projeto.php?id=<?php echo $projetoId; ?>&acao=rejeitar">Rejeitar Projeto</a></p>
    
    <!-- Adicione seus scripts JavaScript aqui, se necessário -->
</body>
</html>
