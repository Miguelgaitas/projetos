<?php

$psw = $_POST["psw"];

$user = $_POST['de'];

if (test_input($user) == $user) {

    if (test_input($psw) == $psw) {

        $searchthis = $user;
        $searchthis2 = $psw;
        $matches = array();
        $matches2 = array();

        $handle = fopen('meus_registros.txt', 'r');
        if ($handle) {
            while (!feof($handle)) {
                $buffer = fgets($handle);
                if (strpos($buffer, $searchthis) !== FALSE) {
                    $matches[] = $buffer;
                }

                if (strpos($buffer, $searchthis2) !== FALSE) {
                    $matches2[] = $buffer;
                }

            }
            fclose($handle);
        }


        if (!empty($matches) && !empty($matches2)) {
            if ($matches == $matches2) {
                echo 'Login Com sucesso';

                echo '<br>';

                echo '<a href="historia.html">Continuar para o site</a>';
            }

        }
        else {
            echo '<script type="text/javascript">alert("utlizador ou password incorretos ou inexistente!"); </script>';

            sleep(1);

            echo '<a href="login.html">Ir para o login</a>';

        }

    }
}







function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}



?>  