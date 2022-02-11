let year = new Date().getFullYear();
let month = new Date().getMonth() + 1;
let diasMes = new Date(year, month, 0).getDate();
let positionDay = new Date().getDay();

let nameMonth = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
]

function loadItemsCalendar(m) {
    document.getElementById("year").innerHTML = year;
    document.getElementById("nameMonth").innerHTML = nameMonth[Number(month - 1)];
    for (let index = 1; index < new Date(year, month - 1, 1).getDay(); index++) {
        let divPadding = document.createElement("div");
        divPadding.id = "padding" + index;
        document.getElementById("calendar").appendChild(divPadding);
    }
    for (let index = 1; index <= new Date(year, month, 0).getDate(); index++) {
        let div = document.createElement("div");
        div.id = index + "/" + m + "/" + year;
        document.getElementById("calendar").appendChild(div);

        div.addEventListener("click", (e) => {
            document.getElementById("modalCalendar").hidden = false;
            document.getElementById("dateModal").value = e.target.id;
            dataReserva[0] = e.target.id;
        });
    }
}

function deleteItemsCalendar(m) {
    for (let index = 1; index < new Date(year, month - 1, 1).getDay(); index++) {
        document.getElementById("calendar").removeChild(document.getElementById("padding" + index));
    }

    for (let index = 1; index <= new Date(year, month, 0).getDate(); index++) {
        document.getElementById("calendar").removeChild(document.getElementById(index + "/" + m + "/" + year));
    }
}

function inner(m) {
    for (let index = 1; index <= new Date(year, month, 0).getDate(); index++) {
        var div = document.getElementById(index + "/" + m + "/" + year);
        div.innerHTML = index;
    }
}

function backMonth() {
    deleteItemsCalendar(month);
    month = month - 1;
    loadItemsCalendar(month);
    inner(month);
    console.log(month);
}

function nextMonth() {
    deleteItemsCalendar(month);
    month = month + 1;
    loadItemsCalendar(month);
    inner(month);
    console.log(month);
}

loadItemsCalendar(month);
inner(month);

//close, select modal

document.getElementById("closeModal").addEventListener("click", () => {
    document.getElementById("modalCalendar").hidden = true;
});
document.getElementById("selectModal").addEventListener("click", () => {
    document.getElementById("modalCalendar").hidden = true;
    dataReserva[1] = document.getElementById("hourR").value;
});