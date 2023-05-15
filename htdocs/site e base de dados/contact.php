<!DOCTYPE html>
<html>

<head>
<script>
function cancelar() {
  window.location.href = "primeira_pagina.html";
}
</script>
  <title>contact</title>
  <link rel="stylesheet" href="home.css">
</head>

<body>
  <header>
    <h2 class="logo">
      <img src="./imagens/Capturar-removebg-preview.png" alt="Logo" class="logo-image"
        style="width: 200px; height: auto;">
    </h2>
</body>
<nav class="navigation">



  <button onclick="window.location.href= './index.php';" class="btnlogin-popup">HOME</button>
</nav>
</header>
<div class="warpper">
  <div class="form-box login">
    <h2>Enviar Mensagem</h2>
    <form method="post" action="enviarmensagem.php">
      <div class="input-box">
         
        <input type="text" name="nome" autocomplete="off" required>
       <label>Nome:</label>
      </div>
      <div class="input-box">
        
        <input type="email" name="email" autocomplete="off" required>
        <label>Email:</label>
      </div>
      <div class="input-box">
        
        <input type="mensagem" name="mensagem" autocomplete="off" required>
        <label>Mensagem:</label>
      </div>
      <button type="submit" value="Enviar" class="btn">Enviar</button><br><br>
      <button type="button" class="btn" onclick="cancelar()">Cancelar</button>

    </form>

  </div>
</div>

</html>