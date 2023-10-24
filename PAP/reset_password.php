<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="./imagens/favicon-32x32.png">
    <title>Redefinir Senha</title>

    <style>
        body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('https://static.vecteezy.com/system/resources/previews/006/430/145/original/technology-background-concept-circuit-board-electronic-system-futuristic-hi-tech-light-on-dark-blue-free-vector.jpg')no-repeat;
    background-size: cover;
    background-position: center;
  } 
        .form-container {
  max-width: 400px;
  background-color: #fff;
  padding: 32px 24px;
  font-size: 14px;
  font-family: inherit;
  color: #212121;
  display: flex;
  flex-direction: column;
  gap: 20px;
  box-sizing: border-box;
  border-radius: 10px;
  box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
  content: center;
}
.form-container {
  max-width: 400px;
  background-color: #fff;
  padding: 32px 24px;
  font-size: 14px;
  font-family: inherit;
  color: #212121;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  gap: 1px;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
  border-radius: 10px;
  -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
          box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
}

.form-container button:active {
  scale: 0.95;
}

.form-container .logo-container {
  text-align: center;
  font-weight: 600;
  font-size: 18px;
}

.form-container .form {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}

.form-container .form-group {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  gap: 1px;
}

.form-container .form-group label {
  display: block;
  margin-bottom: 5px;
}

.form-container .form-group input {
  width: 100%;
  padding: 12px 1px;
  border-radius: 6px;
  font-family: inherit;
  border: 1px solid #ccc;
}

.form-container .form-group input::-webkit-input-placeholder {
  opacity: 0.5;
}

.form-container .form-group input::-moz-placeholder {
  opacity: 0.5;
}

.form-container .form-group input:-ms-input-placeholder {
  opacity: 0.5;
}

.form-container .form-group input::-ms-input-placeholder {
  opacity: 0.5;
}

.form-container .form-group input::placeholder {
  opacity: 0.5;
}

.form-container .form-group input:focus {
  outline: none;
  border-color: #1778f2;
}

.form-container .form-submit-btn {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  font-family: inherit;
  color: #fff;
  background-color: #212121;
  border: none;
  width: 100%;
  padding: 12px 16px;
  font-size: 18px; 
  font-weight: bold; 
  gap: 10px;
  margin: 12px 0;
  cursor: pointer;
  border-radius: 6px;
  -webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
          box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.084), 0px 2px 3px rgba(0, 0, 0, 0.168);
}

.form-container .form-submit-btn:hover {
  background-color: #313131;
}

.form-container .link {
  color: #1778f2;
  text-decoration: none;
}

.form-container .signup-link {
  -ms-flex-item-align: center;
      align-self: center;
  font-weight: 500;
}

.form-container .signup-link .link {
  font-weight: 400;
}

.form-container .link:hover {
  text-decoration: underline;
}



    </style>
</head>
<body>
<div class="form-container">
      <div class="logo-container">
       <h2>Redefinir Senha :</h2>
      </div>

      <form class="form" method="post" action="atualizar_senha.php">
        <div class="form-group">
        <label for="senha"><p>Nova Senha:</p></label>
          <input  type="password" name="senha" placeholder="Nova Senha" style="font-size: 18px; font-weight: bold; color: #333;" required>
        </div>
        <div class="form-group">
        <label for="senha"> <p>Confirmar Senha :</p></label>
          <input  type="password" name="confirm_senha" placeholder="Confirmar senha " style="font-size: 18px; font-weight: bold; color: #333;" required>
          <input type="text" name="token" value="<?php echo $_GET['token']?>" hidden>
        </div>

        <button class="form-submit-btn" type="submit">Alterar Senha </button>
      </form>
    </div>
</body>
</html>
