<!DOCTYPE html>
<html>

<head>
<link rel="icon" href="./imagens/favicon-32x32.png">
<script>
function cancelar() {
  window.location.href = "primeira_pagina.php";
}
</script>
  <title>contact</title>
  <link rel="stylesheet" href="home.css">
</head>

<body>
  <header>
    <h2 class="logo">
      <img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image"
        style="width: 148px; height: auto;">
    </h2>
</body>
<nav class="navigation">



  <button onclick="window.location.href= './primeira_pagina.php';" class="btnlogin-popup">HOME</button>
</nav>
</header>
<div class="warpper">
  <div class="form-box login">
    <h2>Enviar Mensagem</h2>
    <form action="https://formspree.io/f/xpzenyqk" method="post">
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
      <span class="icon"> <ion-icon name="document-text-outline"></ion-icon></span>
        <input type="mensagem" name="mensagem" autocomplete="off" required>
        <label>Mensagem:</label>
      </div>
      <button type="submit" value="Enviar" class="btn">Enviar</button><br><br>
      <button type="button" class="btn" onclick="cancelar()">Cancelar</button>

    </form>

  </div>
</div>
<script src="script.js"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</html>