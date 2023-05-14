<!DOCTYPE html>
<html>

<head>
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

	<title>Login</title>
</head>

<body>
	<header>
	<h2 class="logo">
        <img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image" style="width: 200px; height: auto;">
      </h2>
		<nav class="navigation">
		</nav>
	</header>
	<div class="warpper">
		<span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
		<div class="form-box login">
			<h2>Login</h2>
			<form method="post" action="verifica_login.php">
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
				<div class="remenber-forgot">
					<label><input type="checkbox">remenber me</label>
					<a href="#">forgot password?</a>
				</div>
				<button type="submit" value="Login" class="btn">Login</button>
				<div class="login-register">
					<p>nao tem uma conta?
						<a href="registro.php" class="register-link">register</a>
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