<?php


$user = $_POST['user'];
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$novpass = $_POST['novpass'];
$pass = $_POST['pass'];
$email = $_POST['email'];
$searchthis = $user;
$searchthis2 = $email;

$matches = array();
$matches2 = array();

$handle = fopen('meus_registros.txt', 'r');
if ($handle) {
  while (!feof($handle)) {
    $buffer = fgets($handle);
    if ($pass == $novpass) {
      if (strpos($buffer, $searchthis) !== FALSE || strpos($buffer, $searchthis2) !== FALSE) {
        $matches[] = $buffer;
        $matches2[] = $buffer;
        echo '<script type="text/javascript">alert("Já existe um usuário com esse nome / e-mail! ");</script>';
        echo '<a href="register.html">Ir para o register</a>';
      }

      if (empty($matches) && empty($matches2)) {

        $fich_mail = fopen('meus_registros.txt', 'a');
        $escreve = fwrite($fich_mail, $user . "\t");
        $escreve = fwrite($fich_mail, $nome . "\t");
        $escreve = fwrite($fich_mail, $sobrenome . "\t");
        $escreve = fwrite($fich_mail, $pass . "\t");
        $escreve = fwrite($fich_mail, $novpass . "\t");
        $escreve = fwrite($fich_mail, $email . "\n");
        header("Location:login.html");
      }
    }
    else {
      echo '<script type="text/javascript">alert("As palavras pass não reconhecidas! ");</script>';
      header("Location:register.html");
    }
  }
  fclose($handle);
}

?>