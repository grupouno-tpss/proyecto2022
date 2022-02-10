<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .center {
            display: flex;
            justify-content: center;
        }

        .estado {
            color: red;
            font-weight: bold;
        }

        td,
        th {
            border: solid 1px black;
            text-align: center;
        }

        .tab {
            overflow-x: auto;
            height: 80vh;
        }
    </style>
</head>

<body>
    <?php
    include "layouts/nav.php";

    foreach ($value as $reserve) {
        echo $reserve['id_reservation'] . "<br>";
    }
    ?>
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID reserva</th>
                    <th scope="col">Titular reserva</th>
                    <th scope="col">Cantidad de personas</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Email</th>
                    <th scope="col">Operaciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($value as $reserve) {
                    echo '<tr>
                                <th scope="row">' . $reserve['id_reservation'] . '</th>
                                <td>' . $reserve['p_nombre'] . ' '.$reserve['p_apellido'].'</td>
                                <td>' . $reserve['amount_people'] . '</td>
                                <td>' . $reserve['date'] . '</td>
                                <td>' . $reserve['schedule'] . '</td>
                                <td>' . $reserve['detail'] . '</td>
                                <td>' . $reserve['email'] . '</td>
                                <td>
                                <button class="btn btn-primary">Actualizar</button><button class="btn btn-danger">Cancelar reserva</button>
                                </td>
                            </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        window.onload = function() {
            document.getElementById("loading").hidden = true;
        }
    </script>
</body>

</html>