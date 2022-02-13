<?php
class reservaModel extends Model
{


    public function __construct()
    {
        parent::__construct();
    }

    public function insertReserve(
        $id,
        $fecha,
        $hora,
        $cantPersonas,
        $tipoServicio,
        $especificacion,
        $menu
    ) {

        echo $id . "<br>";
        echo $fecha . "<br>";
        echo $hora . "<br>";
        echo $cantPersonas . "<br>";
        echo $tipoServicio . "<br>";
        echo $especificacion . "<br>";
        echo $menu;
        $date = "INSERT INTO `dates`(`id_date`, `date`, `status`) 
        VALUES ($id ,'$fecha','DISPONIBLE')";

        $detail = "INSERT INTO `details`(`id_detail`, `detail`) 
        VALUES ($id,'$especificacion')";

        $reserve = "INSERT INTO `reservations`(`id_reservation`, `amount_people`,
         `dates_id_date`, `schedules_id_schedule`, `users_id_users`, 
         `details_id_detail`) VALUES ($id, $cantPersonas, $id,
         $hora, " . $_SESSION['user_id'] . ", $id)";

         mysqli_query($this->db, $date);
        echo "Reservación hecha";

         mysqli_query($this->db, $detail);
         mysqli_query($this->db, $reserve);

    }

    public function dates()
    {
        $schedule = "SELECT * FROM schedules";
        $resultado = mysqli_query($this->db, $schedule);

        while ($row = mysqli_fetch_assoc($resultado)) {
            $this->hours[] = $row;
        }
        return $this->hours;
    }
    public function reservations(){
        $reservations = "SELECT id_reservation, amount_people, date, 
        schedule, p_nombre, p_apellido, email, detail FROM reservations R 
        INNER JOIN users U ON U.id_users = ".$_SESSION['user_id']." INNER JOIN dates D 
        ON D.id_date = R.dates_id_date INNER JOIN schedules S 
        ON S.id_schedule = R.schedules_id_schedule INNER JOIN details E 
        ON E.id_detail = R.details_id_detail WHERE R.users_id_users = ".$_SESSION['user_id']."";

        $result = mysqli_query($this->db, $reservations);

        while ($row = mysqli_fetch_assoc($result)){
            $this->reserve[] = $row;
        }
        return $this->reserve;
    }
}


// public function dates()
//     {
//         $schedule = "SELECT * FROM schedules";
//         $resultado = mysqli_query($this->db, $schedule);

//         while ($row = mysqli_fetch_assoc($resultado)) {
//             $this->hours[] = $row;
//         }
//         return $this->hours;
//     }
