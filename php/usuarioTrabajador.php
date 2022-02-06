<?php
require_once("conexion.php");
require_once(realpath(dirname(__FILE__)) . '/usuario.php');

extract($_REQUEST);


/**
 * @access public
 * @author stive
 */
class usuarioTrabajador extends usuario {
	private $_iDtrabajador;
	private $_cargo;

	/**
	 * @access public
	 */

	public function getIDtrabajador() {
		return $this->_iDtrabajador;
	}

	/**
	 * @access public
	 */
	public function getCargo() {
		return $this->_cargo;
	}
}
?>
