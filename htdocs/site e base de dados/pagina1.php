<?php

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

function getProjetos($conn)
{
    $sql = "SELECT * FROM projetos_arduino ORDER BY id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) < 0) {
        return 0;
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["id"];
        $nome = $row["nome"];
        $desc = $row["descricao"];
        $img = $row["imagem"];
        $cod = $row["codigo"];

        echo "<div class='projeto'>
                    <h1>$nome</h1>
                    <img src='./imagens/$img'>
                    <br>
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
	<title>Projeto adrduino Tres Musicas</title>
	<style>


	/* Estilo do cabeçalho */
	header {
		background-color: #333;
		color: #fff;
		padding: 20px;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	/* Estilo do título do cabeçalho */
	header h1 {
		margin: 0;
	}

	/* Estilo da navegação */
	nav {
		display: flex;
	}

	nav a {
		color: #fff;
		text-decoration: none;
		margin-right: 20px;
		font-size: 18px;
		transition: all 0.2s ease-in-out;
	}

	nav a:hover {
		text-decoration: underline;
		transform: scale(1.1);
	}

	/* Estilo do conteúdo principal */
	main {

	}

	/* Estilo do rodapé */
	footer {
		background-color: #333;
		color: #fff;
		padding: 20px;
		text-align: center;
	}

	/* Estilo do texto no rodapé */
	footer p {
		margin: 0;
		font-size: 16px;
	}

	/* Estilo do link no rodapé */
	footer a {
		color: #fff;
		text-decoration: none;
		font-weight: bold;
		transition: all 0.2s ease-in-out;
	}

	footer a:hover {
		text-decoration: underline;
		transform: scale(1.1);
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
  background-color: #333;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
  transition: background-color 0.3s;
}

#voltar-ao-topo:hover {
  background-color: #444;
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
window.onscroll = function() {scrollFunction()};

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
		<h1>Códigos Arduino</h1>
		<nav>
			<a href="index.php">Home</a>
			<a href="pagina2.php">Produtos</a>
			<a href="pagina3.php">Lojas</a>
      <a href="detalhesconta.php" class="round-button">
  <span>Detalhes da Conta</span>
</a>
		</nav>
	</header>

	<main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
	<style>
		
.code-box {
	border: 1px solid #ccc;
	margin-bottom: 1em;
	padding: 1em;
	position: relative;
}

.code-box h2 {
	margin-top: 0;
}

textarea {
	background-color: #f8f8f8;
	border: none;
	box-sizing: border-box;
	color: #333;
	font-family: monospace;
	font-size: 14px;
	padding: 1em;
	width: 100%;
}

.copy-button {
	background-color: #eee;
	border: none;
	border-radius: 3px;
	color: #333;
	cursor: pointer;
	font-size: 14px;
	padding: 0.5em 1em;
	position: absolute;
}
/* posicionar o botão no canto superior direito do container */
.copy-button {
right: 1em;
top: 1em;
}

/* efeito visual do botão ao passar o mouse */
.copy-button:hover {
background-color: #ddd;
}

/* Estilos para a página responsiva /
@media screen and (max-width: 768px) {
/ Reduzir o tamanho da fonte em dispositivos menores */
/* Aumentar o tamanho da caixa de código */
textarea {
	font-size: 16px;
}

/* Posicionar o botão de cópia abaixo da caixa de código */
.code-box {
	padding-bottom: 2em;
}

.copy-button {
	position: static;
	display: block;
	margin: 1em auto 0;
}
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
        .texto{
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
	

	<footer>
		<p>&copy; 2023, Todos os direitos reservados.</p>
	</footer>
</body>
</html>

