<?php
// error_reporting(E_ALL ^ E_NOTICE);
require_once("conexion.php");
extract($_REQUEST);
//use usuario;

/**
 * @access public
 * @author stive
 */
class login
{
	public $_email;
	public $_contrasena;
	public $_resultado;

	public function __construct($email, $contrasena)
	{
		$this->_email = $email;
		$this->_contrasena = $contrasena;
	}
	/**
	 * @AttributeType usuario
	 * /**
	 *  * @AssociationType usuario
	 *  * /
	 */
	public $_unnamed_usuario_;

	/**
	 * @access public
	 */
	public function consultarUsuario()
	{
		$sql = "SELECT email, p_nombre, p_apellido, rol, contraseñacol FROM usuario U INNER JOIN rol_usuario R ON  R.idrol_usuario = U.rol_usuario_idrol_usuario INNER JOIN contraseña C ON C.contraseñacol = '" . $this->getContrasena() . "' WHERE u.email = '" . $this->getNombreUsuario() . "'";

		if ($resultado = mysqli_query(conectUser(), $sql)) {
			if ($user = mysqli_fetch_assoc($resultado)) {
				echo "Si estaaaa";
				session_start();
				echo "<script>alert('" . $user['p_nombre'] . "')</script>";
				$_SESSION['userName'] = $user['p_nombre'] . " " . $user['p_apellido'];
				$_SESSION['userEmail'] = $user['email'];
				$_SESSION['userRol'] = $user['rol'];
			}
		}
	}

	/**
	 * @access public
	 */
	public function redireccionar()
	{
		if (isset($_SESSION["usuario"]) & isset($_SESSION["contraseña"]) & isset($_SESSION["rol"])) {
			header("Location:../views/options.php");
		} else {
			header("Location:../views/login.php");
			echo "<script>alert('No hemos encontrado su usuario, por favor ingrese de nuevo los datos');</script>";
		}
	}

	public function cerrarSession()
	{
		session_destroy();
	}

	/**
	 * @access public
	 */
	public function getNombreUsuario()
	{
		return $this->_email;
	}

	/**
	 * @access public
	 */
	public function getContrasena()
	{
		return $this->_contrasena;
	}

	public function setNombreUsuario($v)
	{
		$this->_nombreUsuario = $v;
	}
	public function setContrasena($v)
	{
		$this->_contrasena = $v;
	}
}

// $login = new login();
// $login->setNombreUsuario($_REQUEST["usuario"]);
// $login->setContrasena($_REQUEST["password"]);
// $login->consultarUsuario();
