function det() {
    var div = document.createElement("div");
    var button = document.createElement("button");


    div.id = "det"
    div.setAttribute("style", "position: fixed; top: 0px; border: solid black 1px; width: 80%; margin: 10%; padding: 20px;box-shadow: 10px 10px 5px 1000px rgba(0,0,0,0.75); background: white; color: black;");

    div.innerHTML = "<a href='#' id='cuent'>RF</a><h1>Detalles de la reservacion 1</h1></br></br></br><p>Nombre y apellidos: Jhojann Estiven Triana Quiroga</p><p>Email: jhostriana11@misena.edu.co</p><p>Numero telefonico: 3227519202</p><p>Fecha: 12/12/2021</p><p>Hora: 18:00<p>Estado: pendiente/proximo</p></br></br></br><button>Modificar datos de reserva</button><button>Archivar reserva</button><button>Cancelar reservación</button></br></br></br><button id='close'>cerrar</button>"

    div.appendChild(button);
    document.body.appendChild(div);
    document.getElementById("close").addEventListener("click", function() {
        document.body.removeChild(div);

    });;

    document.getElementById("cuent").addEventListener("click", function() {
        req("multimedia/reservas.png");
    });
}