<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .navall {
            /* display: flex;
            justify-content: space-between; */
            display: grid;
            grid-template-columns: 25% 47% 3% 25%;
            width: 100%;
            padding-top: 20;
            padding: 10px;
            color: white;
            background: rgba(0, 0, 0, 0.8);
            font-family: cursive;
            font-size: 25px;
        }
    </style>
</head>

<body>
    <nav class="navall">
        <div>SRI</div>
        <div>RESTAURANTE ICHIRAKU</div>
        <div>
            <i class="bi bi-arrow-left-circle-fill"></i>
            <svg id="closeSesion" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle-fill" viewBox="0 0 16 16">
                <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zm3.5 7.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
            </svg>
        </div>
        <div>
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo "Usuario: " . $_SESSION["userEmail"]; ?>
                </a>

                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                    </svg>
                    <li><a class="dropdown-item" href="#"><?php echo "Usuario: " . $_SESSION["userName"]; ?></a></li>
                    <li><a class="dropdown-item" href="#"><?php echo "Usuario: " . $_SESSION["userRol"]; ?></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="../php/login.php?close=true">Cerrar Sessión</a></li>
                </ul>
            </div>
        </div>

    </nav>
    <br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        document.getElementById("closeSesion").addEventListener("click", () => {
            var sessionclose = confirm("¿Cerrar Sesion?");
            if (sessionclose == true) {
                location.href = "../php/login.php?close=true";
            }
        });
        document.getElementById("closeSesion").addEventListener("mouseover", (e) => {
            e.target.title = "Cerrar session";
        });
    </script>
</body>

</html>