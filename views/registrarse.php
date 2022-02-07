<?php
require_once("../php/usuario.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Registrarse</title>
</head>

<body>

    <div class="container">
        <h1 class="text-center">
            Registrarse
        </h1>
        <div class="w-50 mx-auto bg-white p-4 rounded">
            <form action="../controllers/registrarse.php" method="post">
                <label for="p_nombre">Primer nombre *</label>
                <input type="text" class="form-control" id="" name="p_nombre" required>
                <label for="s_nombre">Segundo nombre</label>
                <input type="text" class="form-control" id="s_nombre" name="s_nombre">
                <label for="p_apellido">Primer apellido *</label>
                <input type="text" class="form-control" id="p_apellido" name="p_apellido" required>
                <label for="s_apellido">Segundo apellido</label>
                <input type="text" class="form-control" id="s_apellido" name="s_apellido">
                <label for="email">Correo electrónico *</label>
                <input type="text" class="form-control" id="email" name="email" required>
                <label for="telcelular">Numero celular *</label>
                <input type="text" class="form-control" id="telcelular" name="telcelular" required>
                <label for="telefono">Numero telefonico</label>
                <input type="text" class="form-control" id="telefono" name="telefono">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
                <label for="Contraseña">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                <center><input type="submit" class="btn btn-primary" name="registrar"></center>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>