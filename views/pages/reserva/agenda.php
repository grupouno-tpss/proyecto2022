<style>
    #weekdays,
    #calendar {
        display: grid;
        grid-template-columns: auto auto auto auto auto auto auto;
    }

    #weekdays {
        margin-bottom: 10px;
        text-align: center;
    }

    #header {
        padding: 10px;
        color: #2b87dd;
        font-size: 26px;
        font-family: sans-serif;
        display: flex;
        justify-content: space-between;
    }

    #header button {
        border: solid black 1px;
        background-color: #92a1d1;
        font-size: 15px;
        border-radius: 5px;
    }

    #header button:hover {
        box-shadow: -1px -2px 5px -1px rgba(0, 0, 0, 0.75);
    }

    .day {
        width: 100%;
        height: 80px;
        border: solid gray 1px;
        cursor: pointer;
    }

    #currentDay {
        background: rgb(180, 200, 238);
    }

    .day:hover {
        background: rgb(59, 126, 226);
    }

    #containerA {
        display: block;
        width: 50%;
        margin: auto;
    }

    .date {
        background: gray;
        box-shadow: 10px 10px 5px 1700px rgba(0, 0, 0, 0.75);
        width: 50%;
        padding: 20px;
        position: fixed;
        top: 24%;
        left: 24%;
    }

    /*buttons*/
</style>
<section class="container ag" id="scrollspyHeading1">
    <br>
    <h3 id="scrollspyHeading1">1. Seleccione la fecha de su reservación</h3>


    <div id="containerA">
        <div id="header">
            <div id="monthDisplay"></div>
            <div>
                <button id="backButton">Atras</button>
                <button id="nextButton">Adelante</button>
            </div>
        </div>

        <div id="weekdays">
            <div>Domingo</div>
            <div>Lunes</div>
            <div>Martes</div>
            <div>Miercoles</div>
            <div>Jueves</div>
            <div>Viernes</div>
            <div>Sabado</div>
        </div>

        <div id="calendar"></div>
    </div>





    <div id="modalBackDrop"></div>
</section>

</body>
<script>
    var diaActual;

    let nav = 0;
    let clicked = null;
    let events = localStorage.getItem('events') ? JSON.parse(localStorage.getItem('events')) : [];

    const calendar = document.getElementById('calendar');
    const newEventModal = document.getElementById('newEventModal');
    const deleteEventModal = document.getElementById('deleteEventModal');
    const backDrop = document.getElementById('modalBackDrop');
    const eventTitleInput = document.getElementById('eventTitleInput');
    const weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    function comfirmarDato(day, dato) {
        if (day < diaActual) {
            alert("El dia ya ha pasado...");
        } else {
            var divComfirm = document.createElement("div");
            divComfirm.classList = "date";
            divComfirm.innerHTML = `
            <form>
                <h3>Datos adicionales</h3>
                <strong>` + dato + `</strong>
                <div>
                    Horas disponibles
                    <br>
                    <br>
                    <br>
                </div>
                <label for="">Ingrese la hora de su reservación</label>
                <?php
                $resultado = mysqli_query(conectUser(), "SELECT * FROM info_reserva");
                ?>
                <select id='hora' class="form-select" multiple aria-label="multiple select example">
                    <option selected>Open this select menu</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<option value='".$row["idinfo"]."'>".$row["hora"]."</option>";
                    };
                    ?>
                </select>
                <br>
                <input type="submit" value="Seleccionar hora" id="setDataHF">
                <br>   
            </form>
            <button class="btn btn-light" id="close">Cancelar<button>
        `;
            document.body.appendChild(divComfirm);

            document.getElementById("close").addEventListener("click", (e) => {
                document.body.removeChild(divComfirm);
            });

            document.getElementById("setDataHF").addEventListener("click", (e) => {
                e.preventDefault();
                if (document.getElementById("hora").value == "") {
                    alert("No ha ingresado la hora");
                } else {
                    dataReserva[0] = dato;
                    dataReserva[1] = document.getElementById("hora").value;
                    alert("La fecha selecionada es: " + dataReserva[0] + "\n La hora seleccionada es: " + dataReserva[1]);
                    document.body.removeChild(divComfirm);
                    location.href = "#scrollspyHeading2";
                    asignar();
                };

            });
        }
    }

    function load() {
        const dt = new Date();

        if (nav !== 0) {
            dt.setMonth(new Date().getMonth() + nav);
        }

        const day = dt.getDate();
        const month = dt.getMonth();
        const year = dt.getFullYear();

        const firstDayOfMonth = new Date(year, month, 1);
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const dateString = firstDayOfMonth.toLocaleDateString('en-us', {
            weekday: 'long',
            year: 'numeric',
            month: 'numeric',
            day: 'numeric',
        });
        const paddingDays = weekdays.indexOf(dateString.split(', ')[0]);

        document.getElementById('monthDisplay').innerText =
            `${dt.toLocaleDateString('en-us', { month: 'long' })} ${year}`;

        calendar.innerHTML = '';

        for (let i = 1; i <= paddingDays + daysInMonth; i++) {
            const daySquare = document.createElement('div');
            daySquare.classList.add('day');
            daySquare.id = i - paddingDays + document.getElementById('monthDisplay').textContent;

            const dayString = `${month + 1}/${i - paddingDays}/${year}`;

            if (i > paddingDays) {
                daySquare.innerText = i - paddingDays;
                const eventForDay = events.find(e => e.date === dayString);

                if (i - paddingDays === day && nav === 0) {
                    daySquare.id = 'currentDay';
                    console.log(i - paddingDays);
                    diaActual = i - paddingDays;
                }


            } else {
                daySquare.classList.add('padding');
            }

            calendar.appendChild(daySquare);

            daySquare.addEventListener("click", (e) => {
                comfirmarDato(daySquare.textContent, daySquare.id);
            });


        }

    }





    load();

    function initButtons() {
        document.getElementById('nextButton').addEventListener('click', () => {
            nav++;
            load();
        });

        document.getElementById('backButton').addEventListener('click', () => {
            nav--;
            load();
        });

    }

    initButtons();
    load();
</script>


<script>
    //  COMFIRM DAY
</script>