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
                    header("Location: mensagem_verificacao.php?mensagem=Projeto '$nome' verificado com sucesso!");
                    exit();
                } else {
                    header("Location: mensagem_verificacao.php?mensagem=Erro ao verificar o projeto: " . $conn->error);
                    exit();
                }
            } elseif ($acao === "rejeitar") {
                // Atualize o status para "rejeitado"
                $atualizarSql = "UPDATE projetos_arduino SET status = 'rejeitado' WHERE id = $projetoId";
                if ($conn->query($atualizarSql) === TRUE) {
                    // Defina o prazo de edição para 1 semana (60 segundos * 60 minutos * 24 horas * 7 dias)
                    $prazoEdicao = time() + (60 * 60 * 24 * 7);
            
                    // Atualize o prazo de edição na base de dados
                    $atualizarPrazoSql = "UPDATE projetos_arduino SET prazo_edicao = FROM_UNIXTIME($prazoEdicao) WHERE id = $projetoId";
            
                    if ($conn->query($atualizarPrazoSql) !== TRUE) {
                        echo "Erro ao definir o prazo de edição: " . $conn->error;
                    } else {
                        // Redirecione para a página de sucesso após rejeitar o projeto
                        header("Location: projeto_rejeitado.php?projeto=$projetoId");
                        exit();
                    }
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
<link rel="icon" href="./imagens/favicon-32x32.png">
    <title>Verificar Projeto</title>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: url('https://i.pinimg.com/originals/09/64/a7/0964a7c66f449a148686bc265eaeaec8.jpg') repeat;
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

.container {
    width: 80%;
    max-width: 800px;
    margin: 20px auto;
    background: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}

p {
    margin-bottom: 10px;
}

img {
    max-width: 100%;
    height: auto;
    margin-top: 10px;
    margin-bottom: 10px;
}

.action-button {
    display: inline-block;
    margin-right: 10px;
    padding: 10px 20px;
    background-color: #162938;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}

.action-button:hover {
    background-color: #fff;
    color: #162938;
}

        </style>
</head>
<body>
    <div class="container">
    <h1>Detalhes do Projeto</h1>
        <p><strong>Nome:</strong> <?php echo isset($nome) ? $nome : ''; ?></p>
        <p><strong>Descrição:</strong> <?php echo isset($descricao) ? $descricao : ''; ?></p>
        <p><strong>Imagem:</strong><br><img src='./imagens/<?php echo isset($imagem) ? $imagem : ''; ?>' alt="Imagem do Projeto">
        <p><strong>Simulação:</strong><br> <?php echo isset($simulacao) ? $simulacao : ''; ?></p>
        <p><strong>Código:</strong> <?php echo isset($codigo) ? $codigo : ''; ?></p>

        <h2>Ações</h2>
        <a class="action-button" href="verificar_projeto.php?id=<?php echo $projetoId; ?>&acao=verificar">Verificar Projeto</a>
        <a class="action-button" href="verificar_projeto.php?id=<?php echo $projetoId; ?>&acao=rejeitar">Rejeitar Projeto</a>
    </div>
</body>
</html>

