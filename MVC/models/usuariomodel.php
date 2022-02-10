<?php
class usuarioModel extends Model
{
    private $_p_nombre;
    private $_s_nombre;
    private $_p_apellido;
    private $_s_apellido;
    private $_email;
    private $_telefono;
    private $_tel_celular;
    private $contraseña;

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        //consultar usuario
        $usuario = "SELECT id_users, p_nombre, p_apellido, 
        password, email, rol FROM users INNER JOIN roles 
        ON roles.id_rol = users.roles_id_rol
         WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($this->db, $usuario);

        // while ($row = mysqli_fetch_assoc($result)) {

        // }

        while ($row = mysqli_fetch_assoc($result)) {
            if ($row) {
                session_start();
                $_SESSION['user'] = $row['email'];
                $_SESSION['user_id'] = $row['id_users'];
                echo $row['email'];
            }else{
                session_destroy();
                echo "no hay usuario";
            }
        }
    }

    public function insertar(
        $id,
        $_p_nombre,
        $_s_nombre,
        $_p_apellido,
        $_s_apellido,
        $_email,
        $_telefono,
        $_tel_celular,
        $contraseña,
    ) {
        echo "Hey, el modelo de usuario esta presente jsjs";

        $contacto = "INSERT INTO `contactos`(`id_contacto`, `num_telefono`, 
        `num_celular`) VALUES ($id, $_telefono, $_tel_celular)";

        $usuario = "INSERT INTO `users`(`id_users`, `email`, `password`, 
        `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `roles_id_rol`, 
        `contactos_id_contacto`) VALUES ($id, '$_email','$contraseña',
        '$_p_nombre','$_s_nombre','$_p_apellido','$_s_apellido', 1, $id)";

        mysqli_query($this->db, $contacto);
        mysqli_query($this->db, $usuario);

        echo "<script>alert('Se ha registrado el usuario')</script>";
        header('Location: ' . constant('URL') . '/registrarse');
    }

    public function eliminar()
    {
    }
    public function actualizar()
    {
    }
}
