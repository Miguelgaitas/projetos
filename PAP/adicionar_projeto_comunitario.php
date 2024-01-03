<?php
session_start();
// Configurações do banco de dados
$servername = "localhost";
$username = "id20757658_miguelgaitas";
$password = "MiguelGaitas24.";
$dbname = "id20757658_dados_dos_registros";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Dados do formulário
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem']['name'];
$codigo = $_POST['codigo'];
$sim = $_POST['simula'];

// Move a imagem para um diretório do servidor
$targetDir = "./imagens/";
$targetFile = $targetDir . basename($_FILES['imagem']['name']);
if (move_uploaded_file($_FILES['imagem']['tmp_name'], $targetFile)) {
    echo "Imagem enviada com sucesso!<br>";
} else {
    echo "Erro ao enviar a imagem.<br>";
}

// ID do usuário logado
$meuID = $_SESSION['id_usuario'];

// Insere o projeto na tabela projetos_arduino
$sql = "INSERT INTO projetos_arduino (autor, nome, descricao, imagem, codigo, simula) VALUES ('$meuID', '$nome', '$descricao', '$imagem', '$codigo', '$sim')";

if ($conn->query($sql) === TRUE) {
    // Obtemos o ID do projeto recém-inserido
    $projetoID = $conn->insert_id;

    // Processa as checkbox selecionadas e atualiza a quantidade_utilizada na tabela componentes
    if (!empty($_POST['produtos'])) {
        foreach ($_POST['produtos'] as $produto) {
            $produtoID = mysqli_real_escape_string($conn, $produto);

            // Adiciona 1 à quantidade_utilizada
            $sqlUpdateQuantidade = "UPDATE componentes SET quantidade_utilizada = quantidade_utilizada + 1 WHERE id = '$produtoID'";
            if ($conn->query($sqlUpdateQuantidade) !== TRUE) {
                echo "Erro ao atualizar a quantidade_utilizada para o componente: " . $conn->error;
            }

            // Insere na tabela de relação projetos_componentes
            $sqlProjetoComponente = "INSERT INTO projetos_componentes (projeto_id, componente_id) VALUES ('$projetoID', '$produtoID')";
            if ($conn->query($sqlProjetoComponente) !== TRUE) {
                echo "Erro ao adicionar componente ao projeto: " . $conn->error;
            }
        }
    }

    echo "Projeto adicionado com sucesso!";
} else {
    echo "Erro ao adicionar o projeto: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Projeto Arduino</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: url('https://i.pinimg.com/originals/09/64/a7/0964a7c66f449a148686bc265eaeaec8.jpg') repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            color: white;
            padding: 0;
            box-sizing: border-box;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 6%;
            max-width: 800px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        }

        .modal__header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal__title {
            font-size: 24px;
            color: white;
        }

        .button--icon {
            background: none;
            border: none;
            cursor: pointer;
        }

        .modal__body {
            margin-bottom: 20px;
        }

        .input__description {
            color: #162938;
        }

        .input__label {
            display: block;
            margin-top: 10px;
            color: #162938;
        }

        .input__field {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 2px solid #162938;
            border-radius: 5px;
            outline: none;
            font-size: 1em;
            color: #162938;
        }

        .modal__footer {
            text-align: center;
        }

        .button--primary {
            background-color: #162938;
            color: #fff;
            cursor: pointer;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        .button--primary:hover {
            background-color: #fff;
            color: #162938;
        }

        .back-button {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #162938;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .back-button:hover {
            background-color: #fff;
            color: #162938;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="pagina1.php" class="back-button">Voltar</a>
    </div>
</body>
</html>
