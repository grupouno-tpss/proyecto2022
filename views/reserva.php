<?php
session_start();
require_once("../php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/reserva.css">
    <title>Reservar</title>
    <style>
        .calendar {
            display: grid;
            grid-template-columns: 14.2% 14.2% 14.2% 14.2% 14.2% 14.2% 14.2%;
        }

        .calendar div {
            height: 10vh;
            border: solid gray 1px;
            text-align: center;
        }

        .calendar div:hover {
            background-color: #3F5B97;
            color: white;
            cursor: pointer;
        }

        .infoCalendar {
            display: flex;
            justify-content: space-around;
        }

        .modalCalendar {
            position: fixed;
            top: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contentCalendarModal {
            background-color: white;
            width: 50%;
            padding: 30px;
            display: block;
            border-radius: 5px;
        }
    </style>
</head>

<body onfocus="asignar()">

    <?php
    include "layouts/loading.php";
    include "layouts/nav.php";
    ?>

    <div class="data" id="data" hidden>
        <div id="dataReserva"></div>
        <button id="closeData">Cerrar</button>
    </div>
    <button id="verDatos" class="btn btn-info" autofocus>Ver datos</button>

    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">

        <?php
        include "layouts/reserva/calendario.php";
        include "layouts/reserva/datos.html";
        include "layouts/reserva/menu.html";
        ?>
        <br>

        <!-- Modal de hora fecha -->

        <div class="modalCalendar" id="modalCalendar" hidden>
            <div class="contentCalendarModal">
                <div>
                    <div class="modalTitle">
                        <h2>Seleccionar hora</h2>
                    </div>
                </div>
                <hr>
                <div class="modalContent">
                    <label for="">Fecha seleccionada</label>
                    <input type="text" disabled id="dateModal">
                    <br>
                    <label for="">Seleccione la hora</label>
                    <select class="form-select" id="hourR" multiple aria-label="multiple select example">
                        <?php 

                            $query = mysqli_query(conectUser(), "SELECT * FROM horarios");
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo '<option value="'.$row["id_horario"].'">'.$row['hora'].'</option>';
                            }
                        ?>
                    </select>
                    <br>
                    <button class="btn btn-secondary" id="closeModal">Cancelar</button>
                    <button class="btn btn-success" id="selectModal">Seleccionar fecha</button>
                </div>
            </div>
        </div>


        <section id="cargarReserva" class="container spinners" hidden>
            <div class="container">

                <h3 style="display: block;">reservando</h3><br>
                <div class="spinner-grow text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-secondary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-danger" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-warning" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-info" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-light" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <div class="spinner-grow text-dark" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

        </section>
    </div>
    <!-- FORMULARIO RESERVA -->

    <form action="../controllers/reserva.php" method="post">
        <input hidden type="text" id="fechaSend" name="fecha">
        <input hidden type="text" id="horaSend" name="hora">
        <input hidden type="text" id="cantPersonas" name="cantPersonas">
        <input hidden type="text" id="tipoServicioSend" name="tipoServicio">
        <input hidden type="text" id="especificacion" name="especificacion">
        <input hidden type="text" id="menuS" name="menu">
        <input onclick="asignar()" class="btn btn-primary" style="display: block; margin: auto" type="submit" value="Reservar" name="sendR">
        <br>
        <br>
    </form>

    <script>
        function asignar() {

            console.log(dataReserva[0]);
            document.getElementById("fechaSend").value = dataReserva[0];
            document.getElementById("horaSend").value = dataReserva[1];
            document.getElementById("cantPersonas").value = dataReserva[2];
            document.getElementById("tipoServicioSend").value = dataReserva[3];
            document.getElementById("especificacion").value = dataReserva[4];
            document.getElementById("menuS").value = dataReserva[5];
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="../javascript/dataReserva.js"></script> -->
    <script>
        /*
    [0] = fecha
    [1] = hora
    [2] = Cantidad de personas
    [3] = tipo de servicio
    [4] = especificacion de reserva
*/

        var dataReserva = ["No seleccionada", "No seleccionada", "No seleccionada", "No seleccionada", "No seleccionada", "No seleccionada"];

        document.getElementById("verDatos").addEventListener("click", (e) => {
            mostrarDatos();
        });

        function mostrarDatos() {
            document.getElementById("data").hidden = false;

            document.getElementById("closeData").addEventListener("click", (e) => {
                document.getElementById("data").hidden = true;

            });
            document.getElementById("dataReserva").innerHTML = `
            Fecha seleccionada: <strong>${dataReserva[0]}</strong>
            <br>
            Hora seleccionada: <strong>${dataReserva[1]}</strong>
            <br>
            Cantidad de personas: <strong>${dataReserva[2]}</strong>
            <br>
            Tipo de servicio: <strong>${dataReserva[3]}</strong>
            <br>
            Especificación de reserva: <strong>${dataReserva[4]}</strong>
            <br>
            Menú escogido: <strong>${dataReserva[5]}</strong>
        `;
        }
    </script>

    <script>
        window.onload = function() {
            document.getElementById("loading").hidden = true;
        }
    </script>
    <script src="../javascript/calendar.js"></script>

</body>

</html>