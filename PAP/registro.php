<!DOCTYPE html>
<html>

<head>
	<link rel="icon" href="./imagens/favicon-32x32.png">
	<script>
		// Função para exibir a mensagem de login bem-sucedido em um pop-up
		function exibirMensagem() {
			var mensagem = "<?php echo isset($_GET['mensagem']) ? $_GET['mensagem'] : ''; ?>";
			if (mensagem) {
				alert(mensagem);
			}
		}
		window.onload = exibirMensagem;
	</script>
	<link rel="stylesheet" href="home.css">

	<title>Registro</title>
</head>

<body>
	<header>
		<h2 class="logo">
			<img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image"
				style="width: 130px; height: auto;">
		</h2>

	</header>
	<div class="warpper">
		<span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
		<div class="form-box register">
			<form method="post" action="registra_usuario.php">
				<div class="input-box">
					<span class="icon"><ion-icon name="person-outline"></ion-icon></span>
					<input type="text" name="nome" autocomplete="off" required>
					<label>Nome:</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
					<input type="email" name="email" autocomplete="off" required>
					<label>Email:</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<input type="password" name="senha" required>
					<label>Senha:</label>
				</div>
				<div class="input-box">
					<span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
					<input type="password" name="confirm_senha" required>
					<label>Confirmar Senha:</label>
				</div>

				<button type="submit" value="Registrar" class="btn">Registrar</button>
				<div class="login-register">
					<p>Já tem uma conta?
						<a href="login.php" class="login-link">Login</a>
					</p>
				</div>
			</form>

		</div>
	</div>
	<script src="script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>