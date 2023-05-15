<?php
include("./verificaradm.php");
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Configurações do banco de dados
$servername = "localhost";
$username = "seu_username";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Conecta ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Limpa as variáveis do formulário
    $idMensagem = $_POST['id'];
    $assunto = "Resposta à sua mensagem";

    // Consulta o banco de dados para obter os dados da mensagem
    $sql = "SELECT email, mensagem, respondida FROM mensagens WHERE id = $idMensagem";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emailDestinatario = $row['email'];
        $mensagemOriginal = $row['mensagem'];
        $respondida = $row['respondida'];

        // Verifica se a mensagem já foi respondida
        if ($respondida == 1) {
            echo "Esta mensagem já foi respondida anteriormente.";
        } else {
            // Constrói a resposta
            $resposta = "Caro(a) destinatário(a),\r\n\r\n";
            $resposta .= "Obrigado por entrar em contato conosco. Segue abaixo a resposta à sua mensagem:\r\n\r\n";
            $resposta .= "-------------------\r\n";
            $resposta .= $mensagemOriginal;
            $resposta .= "-------------------\r\n\r\n";
            $resposta .= "Esperamos ter esclarecido suas dúvidas. Fique à vontade para entrar em contato novamente se precisar de mais informações.\r\n\r\n";
            $resposta .= "Atenciosamente,\r\n";
            $resposta .= "Administração do Site\r\n";

            // Envia o e-mail de resposta
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'seu_servidor_smtp';
            $mail->SMTPAuth = true;
            $mail->Username = 'seu_email@exemplo.com';
            $mail->Password = 'sua_senha';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('seu_email@exemplo.com', 'Administração do Site');
            $mail->addAddress($emailDestinatario);
            $mail->Subject = $assunto;
            $mail->Body = $resposta;

            if ($mail->send()) {
                // Atualiza o status da mensagem como respondida no banco de dados
                $sqlUpdate = "UPDATE mensagens SET respondida = 1 WHERE id = $idMensagem";
                if ($conn->query($sqlUpdate)) {
                    echo "E-mail de resposta enviado com sucesso!";
                } else {
                    echo "Erro ao atualizar o status da mensagem.";
                }
            } else {
                echo "Erro ao enviar e-mail de resposta: " . $mail->ErrorInfo;
            }
        }
    } else {
        echo "Mensagem não encontrada na base de dados.";
    }
}

$conn->close();
?>    
