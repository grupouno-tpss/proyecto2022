var select = document.getElementById("user");

select.addEventListener("submit", (e) => {
    e.preventDefault();
    var datos = new FormData(select);

    fetch("../php/user.php", {
        method: "POST",
        body: datos
    })

        .then(res => res.json())
        .then(res => {
            alert(("Segur@ que quiere ingresar a " + res));
        })
});
