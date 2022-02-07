<?php


session_start();
if(isset($_SESSION["usuario"]) and $_SESSION["contraseña"]) {
    header("Location:options.php");
}


//require_once("../php/usuario.php");
extract($_REQUEST);

if (isset($_REQUEST["s"])) {
    echo "<script>alert('No se ha iniciado sección');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php include "layouts/loading.php"?>
    <nav>
        <img src="https://ichirakuramenco.com/wp-content/uploads/2020/05/cropped-Logo1-1-1-4.png" width="100px" />
        <img src="https://ichirakuramenco.com/wp-content/uploads/elementor/thumbs/LOGO-CHI-GRAN-p9tyk7dshpshzgdlw2r1j5budzbjvxszg3avmoxhu0.png" alt="" width="100px" />
    </nav>
    <div class="formR">
        <a href="#" onclick='req("multimedia/login.png")'>RF</a>
        <form action="../controllers/login.php" method="POST">
            <input type="text" name="usuario" placeholder="Ingresar Usuario" required>
            <input type="password" name="password" placeholder="ingrese contraseña" required>
            <input type="submit" name="ingresar" value="Ingresar" a href="worker.php">
            <br>
            <br>

            <a href="changePassword.html">
                <h5>He olvidado mi contraseña</h5>
            </a>

        </form>
    </div>

    <?php


    ?>
    <script src="javascript/postImg.js"></script>
    <script>
        window.onload = function () {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>