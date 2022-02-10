<?php
session_start();
require_once('../php/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .content {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 30px;
            width: 97%;
            color: white;
            margin: auto;
        }

        body {
            background-image: url(https://fondosmil.com/fondo/11825.jpg);
        }

        .section {
            height: 80vh;
        }

        .cards div {
            padding: 50px;
            background-color: #3660BF;
            border-radius: 5px;
            cursor: pointer;
        }

        .cards div:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .cards div a {
            font-size: 25px;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include "layouts/nav.php";
    ?>

    <!--Modal del menus--->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir menú</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form action="">
                            <label for="">Titulo del menú</label>
                            <input type="text" class="form-control" id="" name="">
                            <label for="">Descripción del menú</label>
                            <input type="text" class="form-control" id="" name="">
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal DE FECHAS -->
    <div class="modal fade" id="fechas" tabindex="-1" aria-labelledby="fechas" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Añadir fecha no disponible</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    $fechas = mysqli_query(conectUser(), "SELECT * FROM fechas_reserva WHERE estado = 'ACTIVA'");

                    while ($row = mysqli_fetch_assoc($fechas)) {
                        echo '<div class="bg-secondary m-3 P-3 d-flex justify-content-between" style="width: 25%;">
                                    <div>' . $row['fecha'] . '</div>
                                    <div><button class="btn btn-primary"><a href="?u='.$row['id_fecha'].'">+</a></button></div>
                            </div>';
                    }
                    ?>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="section">
            <br><br>
            <div>
                <button class="btn btn-primary"><a href="" class="link-light">Agregar usuario</a></button>
                <button class="btn btn-secondary"><a href="" class="link-light">Genera informe</a></button>
                <button class="btn btn-warning"><a href="" class="link-dark">Gestionar menus</a></button>
                <button class="btn btn-warning"><a href="" class="link-dark">Gestionar fechas</a></button>
                <button class="btn btn-warning"><a href="" class="link-dark">Gestionar horas (disponibles)</a></button>
            </div>
            <hr>
            <br><br><br>
            <div class="d-flex align-items-center justify-content-around cards">
                <div><a href="#empleados" class="link-light">Empleados</a></div>
                <div><a href="#clientes" class="link-light">Clientes</a></div>
                <div><a href="" class="link-light">Reservaciones</a></div>
                <div><a href="" class="link-light">Menus</a></div>
            </div>
        </div>
        <div class="section overflow-auto" id="empleados">
            <h2 class="text-center">Empleados</h2>
            <br>
            <table class="table table-dark table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">id usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Telefono Celular</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $empleados = mysqli_query(conectUser(), "SELECT id_usuario, email, p_nombre, p_apellido, telefono, telcelular FROM usuarios U INNER JOIN contactos C ON C.idcontacto = U.contactos_idcontacto WHERE U.roles_usuario_idrol_usuario = 2");

                    while ($row = mysqli_fetch_assoc($empleados)) {
                        echo '<tr>
                                    <th scope="row">' . $row['id_usuario'] . '</th>
                                    <td>' . $row['p_nombre'] . " " . $row['p_apellido'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['telefono'] . '</td>
                                    <td>' . $row['telcelular'] . '</td>
                                    <td>
                                        <button class="btn btn-primary">Modificar<button>
                                        <button class="btn btn-danger">Eliminar<button>
                                    </td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!--Clientes-->

        <div class="section overflow-auto" id="clientes">
            <h2 class="text-center">Clientes</h2>
            <br>
            <table class="table table-dark table-bordered text-center">
                <thead>
                    <tr>
                        <th scope="col">id usuario</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Telefono Celular</th>
                        <th scope="col">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $empleados = mysqli_query(conectUser(), "SELECT id_usuario, email, p_nombre, p_apellido, telefono, telcelular FROM usuarios U INNER JOIN contactos C ON C.idcontacto = U.contactos_idcontacto WHERE U.roles_usuario_idrol_usuario = 1");

                    while ($row = mysqli_fetch_assoc($empleados)) {
                        echo '<tr>
                                    <th scope="row">' . $row['id_usuario'] . '</th>
                                    <td>' . $row['p_nombre'] . " " . $row['p_apellido'] . '</td>
                                    <td>' . $row['email'] . '</td>
                                    <td>' . $row['telefono'] . '</td>
                                    <td>' . $row['telcelular'] . '</td>
                                    <td>
                                        <button class="btn btn-primary">Modificar<button>
                                        <button class="btn btn-danger">Eliminar<button>
                                    </td>
                                </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="section overflow-auto">
            <h2 class="text-center">Gestionar menus</h2>
            <center>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Añadir menus
                </button>
            </center>
        </div>
        <div class="section">
            <h2 class="text-center">
                Fechas no disponibles
            </h2>
            <br>
            <center>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fechas">
                    Agregar una fecha <strong>que no sea disponible</strong>
                </button>
            </center>
            <br>
            <div class="container bg-white text-dark p-3 d-flex">

                <?php
                $fechas = mysqli_query(conectUser(), "SELECT * FROM fechas_reserva WHERE estado = 'NO DISPONIBLE'");

                while ($row = mysqli_fetch_assoc($fechas)) {
                    echo '<div class="bg-secondary m-3 d-flex justify-content-between" style="width: 10%;">
                                    <div>' . $row['fecha'] . '</div>
                                    <div>X</div>
                                </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>