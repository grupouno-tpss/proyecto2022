<?php

session_start();
// if (isset($_SESSION["usuario"])) {
//     echo "<script>alert('Se ha iniciado sessión');</script>";
// }else{
//     header("Location:login.php?s=false");
//     die();
// }
echo "<script>alert('".$_SESSION['user']."')</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            font-family: cursive;
        }

        h1 {
            text-align: center;
        }

        .options {
            height: 70vh;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .options div {
            padding: 7%;
            background: antiquewhite;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
        }

        .options div:hover {
            background: blanchedalmond;
            border: solid rgba(0,0,0,0.9) 3px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <?php
    include "pages/loading.php";
    include "pages/nav.php";
    ?>
    <br>
    <br>
    <br>
    <h1>¿Qué desea hacer?</h1>
    <div class="options">
        <div><a href="reserva.php">Reservar</a></div>
        <div><a href="reservaciones.php">Cancelar reserva</a></div>
        <div><a href="reservaciones.php">Modificar reserva</a></div>
    </div>
    <script>
        window.onload = function () {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>