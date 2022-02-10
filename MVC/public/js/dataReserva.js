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
