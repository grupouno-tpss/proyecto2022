

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <?php include "layouts/loading.php"?>
    <nav>
        <img src="https://ichirakuramenco.com/wp-content/uploads/2020/05/cropped-Logo1-1-1-4.png" width="100px" />
        <img src="https://ichirakuramenco.com/wp-content/uploads/elementor/thumbs/LOGO-CHI-GRAN-p9tyk7dshpshzgdlw2r1j5budzbjvxszg3avmoxhu0.png" alt="" width="100px" />
    </nav>
    <div class="formR">
        <form action="<?php echo constant('URL')?>/login/consultUser" method="post">
            <label for="user">Ingrese el correo electrónico</label>
            <input type="email" class="form-control" id="user" name="user" required>
            <label for="user">Ingrese la contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
            <input type="submit" class="form-control">
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