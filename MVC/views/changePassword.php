<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="javascript/noResponsive.js"></script>
    <link rel="stylesheet" href="../css/changePassword.css">
</head>

<body>
    <nav>
        <h1>SRI</h1>
    </nav>
    <div class="content">
        <a href="#" onclick='req("multimedia/recuperarContraseña.png")'>RF</a>

        <br><br>
        <h1>Recupera tu contraseña</h1>
        <br>
        <hr>
        <div>
            <form action="" method="POST">
                <label for="">Ingrese su dirección de correo electrónico o el nombre de usuario asignado</label><br>
                <input type="email" placeholder="Correo electrónico o usuario">
                <input type="submit" class="submit" onclick="confirm()">
            </form>
            <hr>
        </div>
    </div>

    <script>
        function confirm() {
            prompt("Se ha enviado un código de verificación a su correo electrónico, por favor ingréselo en el siguiente campo: ");
            alert("Se ha cambiado su contraseña, por favor vuelva a ingresar al sistema.");
        }
    </script>
    <script src="javascript/postImg.js"></script>

</body>

</html>