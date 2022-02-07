function postImg(a) {
    var img = document.createElement("img");
    var button = document.createElement("button");
    img.src = a;
    img.id = "post"

    button.innerHTML = "Cerrar"

    button.setAttribute("style", "position: fixed; top:30px;");
    img.setAttribute("style", "width: 90%; position: fixed; top: 31px; margin-left: 5%; height: 100vh; background:rgba(0, 0, 0, 0.5);");

    document.body.appendChild(img);
    document.body.appendChild(button);

    button.addEventListener("click", () => {
        document.body.removeChild(img);
        document.body.removeChild(button);
    });
}

function req(a) {
    var img = document.createElement("img");
    var button = document.createElement("button");
    img.src = a;
    img.id = "post"

    button.innerHTML = "Cerrar"

    button.setAttribute("style", "position: fixed; top:30px;");
    img.setAttribute("style", "width: 60%; position: fixed; top: 01px; margin-left: 15%; height: 600px; background:rgba(0, 0, 0, 0.5);");

    document.body.appendChild(img);
    document.body.appendChild(button);

    button.addEventListener("click", () => {
        document.body.removeChild(img);
        document.body.removeChild(button);
    });
}