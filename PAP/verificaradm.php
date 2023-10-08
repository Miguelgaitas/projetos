<?php

session_start();

if($_SESSION['isAdmin'] == false){
    echo "no permission";

    header("Location: index.php");
    return;
}

?>