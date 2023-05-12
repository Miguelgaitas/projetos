
<!DOCTYPE html>
<html>
<head>
	<title>Minha Página Inicial</title>
	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

		html, body {
			background-image: url(https://c4.wallpaperflare.com/wallpaper/88/22/573/arduino-open-source-wallpaper-preview.jpg);
			background-repeat: no-repeat;
			background-size: cover;
			background-position: center;
			margin: 0;
			padding: 0;
			font-family: 'Poppins', sans-serif;
		}

		.wrapper {
			margin: 0;
			padding: 0;
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			width: 100vw;
			min-height: 100vh;
			background-color: rgba(0, 0, 0, 0.5);
		}

		header {
			background-color: #333;
			color: #fff;
			padding: 20px;
			display: flex;
			align-items: center;
			justify-content: space-between;
		}

		nav {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			padding: 20px;
			background-color: #eee;
			border-radius: 10px;
			margin: 20px;
			box-shadow: 0px 0px 10px #888888;
		}

		nav a {
			background-color: #333;
			color: #fff;
			display: inline-block;
			padding: 10px 20px;
			margin: 10px;
			border-radius: 5px;
			text-decoration: none;
			text-transform: uppercase;
			letter-spacing: 2px;
			transition: background-color 0.3s ease;
			box-shadow: 0px 0px 5px #888888;
		}

		nav a:hover {
			background-color: #555;
		}

		h1 {
			font-size: 48px;
			margin-top: 50px;
			text-align: center;
			color: white;
			text-shadow: 1px 1px #fff;
		}

		p {
			font-size: 30px;
			margin-top: 32px;
			text-align: center;
			color: white;
			text-shadow: 1px 1px #fff;
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
		<h2 style="color: #eee;">Minha Página Inicial</h2>
		<a href="detalhesconta.php" class="round-button">
  <span>Detalhes da Conta</span>
</a>

	</header>
	<nav>
		<a href="pagina1.php">Projetos</a>
		<a href="pagina2.php">Produtos</a>
		<a href="pagina3.php">Lojas</a>
		
	</nav>
	<h1>O que é Arduino e como ele pode ajudar nos seus projetos de eletrônica?</h1>
	<p>Você já ouviu falar em Arduino? Se você é um entusiasta de eletrônica, estudante, professor ou profissional de áreas como engenharia, design e arte, provavelmente já conhece essa plataforma de prototipagem eletrônica de código aberto. Mas se você ainda não sabe do que se trata, vamos explicar tudo neste artigo.
	<br><br>
O Arduino é uma placa de circuito impresso com um microcontrolador e um ambiente de desenvolvimento integrado (IDE) que permite programar o microcontrolador para controlar diversos dispositivos eletrônicos. O objetivo do Arduino é tornar a eletrônica mais acessível a um público mais amplo, fornecendo uma plataforma de fácil utilização e baixo custo para a criação de projetos eletrônicos interativos.
<br><br>
Com o Arduino, é possível criar desde projetos simples, como acender um LED, até projetos mais complexos, como robôs e sistemas de automação residencial. A plataforma é bastante flexível e pode ser utilizada em uma ampla variedade de projetos, desde a automação de processos industriais até projetos de arte interativa.
<br><br>
Uma das grandes vantagens do Arduino é a sua grande comunidade de usuários, que criam e compartilham projetos e bibliotecas de código para ajudar os iniciantes a começar a trabalhar com a plataforma. Além disso, existem inúmeros recursos online, como fóruns de discussão, tutoriais e cursos, que ajudam os usuários a aprimorar seus conhecimentos e habilidades.
<br><br>

Se você está interessado em começar a trabalhar com eletrônica e programação, o Arduino é uma excelente opção. Com a plataforma, você pode criar seus próprios projetos, explorar novas ideias e se divertir enquanto aprende. Não perca mais tempo e comece a trabalhar com Arduino hoje mesmo!</p>

<button id="voltar-ao-topo" onclick="topFunction()">Voltar ao topo</button>

</body>
</html>
