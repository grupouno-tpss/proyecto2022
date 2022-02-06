<?php
require_once("conexion.php");
require_once(realpath(dirname(__FILE__)) . '/usuario.php');
extract($_REQUEST);

//use usuario;

/**
 * @access public
 * @author stive
 */
class usuarioCliente extends usuario
{

	private $id;
	//private $_iDcliente;

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */

	public function agregarusuarioCliente()
	{

		$this->id = $this->generarID();
		$password = "INSERT INTO contraseña(idcontraseña, contraseñacol)
	 	VALUES(" . $this->id . ",'" . $this->getContraseña() . "')";

		$contacto = "INSERT INTO contacto(idcontacto, telefono, telcelular) 
		VALUES(" . $this->id . ", " . $this->getNumeroTelefonico() . ", " . $this->getNumeroCelular() . ")";

		$usuario = "INSERT INTO usuario(id, email, p_nombre, s_nombre, p_apellido, s_apellido, contacto_idcontacto, contraseña_idcontraseña, rol_usuario_idrol_usuario) 
		VALUES (" . $this->id . ", '".$this->getEmail()."', '".$this->getPnombre()."', '".$this->getSnombre()."', '".$this->getPapellido()."', '".$this->getSapellido()."'
		, " . $this->id . ", " . $this->id . ", 1)";

		mysqli_query(conectUser(), $password);
		mysqli_query(conectUser(), $contacto);
		mysqli_query(conectUser(), $usuario);
	}
}
