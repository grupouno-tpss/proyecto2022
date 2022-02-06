<?php
extract($_REQUEST);
require_once("conexion.php");
//require_once(realpath(dirname(__FILE__)) . '/reserva.php');
//require_once(realpath(dirname(__FILE__)) . '/login.php');

// use reserva;
// use login;
/**
 * @access public
 * @author grupo1-2338404
 */
class usuario
{
	private $_rol;
	private $_p_nombre;
	private $_s_nombre;
	private $_p_apellido;
	private $_s_apellido;
	private $_numeroCelular;
	private $_numeroTelefonico;
	private $_email;
	private $_direccion;
	private $_contraseña;

	public function __construct(
		$rol,
		$p_nombre,
		$s_nombre,
		$p_apellido,
		$s_apellido,
		$numeroCelular,
		$numeroTelefonico,
		$email,
		$direccion,
		$contraseña
	) {
		$this->_rol = $rol;
		$this->_p_nombre = $p_nombre;
		$this->_s_nombre = $s_nombre;
		$this->_p_apellido = $p_apellido;
		$this->_s_apellido = $s_apellido;
		$this->_numeroCelular = $numeroCelular;
		$this->_numeroTelefonico = $numeroTelefonico;
		$this->_email = $email;
		$this->_direccion = $direccion;
		$this->_contraseña = $contraseña;
	}

	/**
	 * @AttributeType reserva
	 * /**
	 *  * @AssociationType reserva
	 *  * /
	 */
	public $_unnamed_reserva_;
	/**
	 * @AttributeType login
	 * /**
	 *  * @AssociationType login
	 *  * @AssociationKind Aggregation
	 *  * /
	 */
	public $_unnamed_login_;

	/**
	 * @access public
	 */

	#C R U D

	public function generarID () {
		return rand();
	}


	#GET

	public function getContraseña()
	{
		return $this->_contraseña;
	}
	public function getRol()
	{
		return $this->_rol;
	}
	public function getPnombre()
	{
		return $this->_p_nombre;
	}

	public function getSnombre()
	{
		return $this->_s_nombre;
	}

	public function getPapellido()
	{
		return $this->_p_apellido;
	}

	public function getSapellido()
	{
		return $this->_s_apellido;
	}

	public function getDirecion()
	{
		return $this->_direccion;
	}

	/**
	 * @access public
	 */
	public function getNumeroCelular()
	{
		return $this->_numeroCelular;
	}

	/**
	 * @access public
	 */
	public function getNumeroTelefonico()
	{
		return $this->_numeroTelefonico;
	}

	/**
	 * @access public
	 */
	public function getEmail()
	{
		return $this->_email;
	}

	#SET
	// public function setContraseña($v) {
	// 	$this->_contraseña = $v;
	// }
	// public function setRol($v) {
	// 	$this->_rol = $v;
	// }
	// public function setTipodocument($v) {
	// 	$this->_tipoDocumento = $v;
	// }
	// public function setNumdocument($v) {
	// 	$this->_numDocumento = $v;
	// }
	// public function setPnombre($v) {
	// 	$this->_Pnombre = $v;
	// }

	// public function setSnombre($v) {
	// 	$this->_Snombre = $v;
	// }

	// public function setPapellido($v) {
	// 	$this->_Papellido = $v;
	// }

	// public function setSapellido($v) {
	// 	$this->_Sapellido = $v;
	// }

	// public function setDirecion($v) {
	// 	$this->_direccion = $v;
	// }

	// /**
	//  * @access public
	//  */
	// public function setNumeroCelular($v) {
	// 	$this->_numeroCelular = $v;
	// }

	// /**
	//  * @access public
	//  */
	// public function setNumeroTelefonico($v) {
	// 	$this->_numeroTelefonico = $v;
	// }

	// /**
	//  * @access public
	//  */
	// public function setEmail($v) {
	// 	$this->_email = $v;
	// }

}
