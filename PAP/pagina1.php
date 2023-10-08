<?php

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

session_start();

function getProjetos($conn)
{
  $meuID = $_SESSION['id_usuario'];
  $sql = "SELECT p.id, p.nome, p.descricao, p.status, p.imagem, p.codigo, u.nome AS nome_utilizador
          FROM projetos_arduino p
          LEFT JOIN usuarios u ON p.autor = u.id
          WHERE p.status='verificado' OR (p.status != 'verificado' AND p.autor = $meuID)
          ORDER BY p.id";
  $result = mysqli_query($conn, $sql);

  if (!$result || mysqli_num_rows($result) == 0) {
    return 0;
  }

  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["id"];
    $nome = $row["nome"];
    $desc = $row["descricao"];
    $status = $row["status"];
    $img = $row["imagem"];
    $cod = $row["codigo"];
    $nomeUtilizador = $row["nome_utilizador"];

    echo "<div class='projeto'>
            <h1>$nome</h1>
            <img src='./imagens/$img'>
            <br>
            <h3><p class=$status>Status: " . ucfirst($status) . "</p></h3>
            <p>Criado por : $nomeUtilizador</p>
            <br>
            <center>
              <a class='texto' href='projeto.php?id=$id'>Ver Mais</a>
            </center>
          </div>";
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <link rel="icon" href="./imagens/favicon-32x32.png">
  <title>Projeto adrduino Tres Musicas</title>
  <style>
    /* Estilo do cabeçalho */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'poppins', sans-serif;

    }

    header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 150px;
      padding: 20px 100px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 99;
      backdrop-filter: blur(10px);
      border: 2px solid rgba(255, 255, 255, .5);
      border-radius: 6px;
    }

    /* Estilo do título do cabeçalho */
    header h1 {
      margin: 0;
    }

    .navigation a {
      position: relative;
      font-size: 1.1em;
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      margin-left: 40px;
    }

    .navigation a::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 100%;
      height: 3px;
      background: #fff;
      border-radius: 5px;
      transform-origin: right;
      transform: scaleX(0);
      transition: transform .5s;
    }

    .navigation a:hover::after {
      transform-origin: left;
      transform: scaleX(1);
    }

    .conteiner {
      width: 100%;
      max-width: 500px;
      backdrop-filter: blur(10px);
    }

    .logo {
      font-size: 2em;
      color: #fff;
      user-select: none;
    }

    .navigation .btnlogin-popup {
      width: 130px;
      height: 50px;
      background: transparent;
      border: 2px solid #fff;
      outline: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      color: #fff;
      font-weight: 500;
      margin-left: 40px;
      transition: .5s;
    }

    .navigation .btnlogin-popup:hover {
      background: #fff;
      color: #162938;
    }



    #voltar-ao-topo {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #fff;
      color: #444;
      cursor: pointer;
      padding: 15px;
      border-radius: 10px;
      transition: background-color 0.3s;
    }

    #voltar-ao-topo:hover {
      color: #fff;
      background-color: #444;
    }

    .verificado {
      color: green;
    }

    .rejeitado {
      color: red;
    }

    .pendente {
      color: yellow;
    }

    /* Mostra o botão quando o usuário rolar 20px para baixo da parte superior da página */
    @media screen and (min-height: 600px) {
      #voltar-ao-topo.show {
        display: block;
      }
    }

    .round-button {
      display: inline-block;
      background-color: grey;
      color: white;
      border-radius: 50%;
      padding: 10px 20px;
      text-decoration: none;
      font-size: 16px;
    }

    .round-button:hover {
      background-color: #45a049;
    }
  </style>
  <script>
    // Quando o usuário rolar 20px para baixo da parte superior da página, mostra o botão
    window.onscroll = function () { scrollFunction() };

    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("voltar-ao-topo").classList.add("show");
      } else {
        document.getElementById("voltar-ao-topo").classList.remove("show");
      }
    }

    // Quando o usuário clicar no botão, volta para o topo da página
    function topFunction() {
      document.body.scrollTop = 0; // Para Safari
      document.documentElement.scrollTop = 0; // Para Chrome, Firefox, IE e Opera
    }
  </script>

</head>

<body>

  <header>

    <h2 class="logo">
      <img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image"
        style="width: 148px; height: auto;">
    </h2>
    <nav class="navigation">
      <a href="primeira_pagina.php">Home</a>
      <a href="addprojetoscomunitarios.php">Propor projeto</a>
      <a href="contact.php">Contact</a>
      <button onclick="window.location.href= './detalhesconta.php';" class="btnlogin-popup">Conta</button>
      </a>

    </nav>
  </header>

  <main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

      body {
        background-image: url(https://www.shutterstock.com/image-vector/hardware-software-computer-technology-background-600w-2048513402.jpg);
        background-repeat: repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
      }

      .wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        min-width: 96vw;
        min-height: 100vh;
        background-color: rgba(0, 0, 0, 0.5);
      }

      .projeto {
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(255, 255, 255, 0.75);
        border-radius: 15px;
        overflow: hidden;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 15px;
        margin: 10px;
        margin-top: 180px;
        max-width: 380px;
        height: 500px;
        background-color: rgba(0, 0, 0, 0.01);
        backdrop-filter: blur(6px);
        color: white;
      }

      .projeto h1 {
        margin-top: 10px;
      }

      .projeto img {
        width: 380px;
        height: 320px;
        margin-left: 10px;
        margin-right: 10px;
        background-color: lightblue;
        text-align: center;
        line-height: 200px;
        font-size: 36px;
        color: white;
        border-radius: 5px;
      }

      .add-button {
        text-align: center;
        margin-bottom: 20px;
      }

      .texto {
        border-radius: 5px;

        padding: 10px;
        height: 25px;
        margin-bottom: 10px;
        text-decoration: none;
        color: white;
        background-color: rgba(255, 255, 255, 0.25);
      }
    </style>
    </head>

    <body>
      <div class="wrapper">
        <?php
        getProjetos($conn);
        ?>
      </div>
      <button id="voltar-ao-topo" onclick="topFunction()">Voltar ao topo</button>
  </main>
</body>

</html>