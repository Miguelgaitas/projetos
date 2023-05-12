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

if (isset($_GET['id'])) {

    function getProjetos($conn){
    $pid = $_GET['id'];
    $sql = "SELECT * FROM projetos_arduino where id = $pid ORDER BY id";
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
                    <img src='./imagens/$img'><br>
                    <p>$desc</p>
                    <pre>
                        <p>$cod</p>
                    </pre>
                </div>";
        
        }
    }   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap');
        body {
            background-image: url(https://www.wallpapertip.com/wmimgs/34-343249_python-arduino.jpg);
            background-repeat: no-repeat;
            background-size: cover;
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

        .projeto {
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            border-radius: 15px;
            overflow: hidden;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 15px;
            margin: 10px;
            width: 400px;
            min-height: 500px;
            background-color: rgba(0, 0, 0, 0.01);
            backdrop-filter: blur(3px);
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

        .projeto * {
            text-decoration: none;
            color: white;
        }
        .add-button {
            text-align: center;
            margin-bottom: 20px;
        }

        .projeto pre {
            display: flex;
            min-width:300px;
            border: 2px solid gray;
            background-color: rgba(0,0,0,0.35);
            padding: 15px;
            font-weight: 500;
            font-family: 'Source Code Pro', monospace;
        }


        .projeto a{
            border-radius: 5px;
            width: 150px;
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
    
</body>
</html>