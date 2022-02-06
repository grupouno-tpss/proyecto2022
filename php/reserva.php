<?php
// require_once(realpath(dirname(__FILE__)) . '/usuario.php');
//
// use usuario;
//session_start();
session_start();
require_once("usuario.php");
require_once("conexion.php");

extract($_REQUEST);



/**
 * @access public
 * @author stive
 */



class reserva
{
	private $_fecha;
	private $_hora;
	private $_menu;
	private $_personas;
	private $_paquete;
	private $_indicaciones;
	private $_estado;
	private $_id;

	public function __construct(
		$fecha,
		$hora,
		$menu,
		$personas,
		$paquete,
		$indicaciones,
		$estado,
		$id
	) {
		$this->_fecha = $fecha;
		$this->_hora = $hora;
		$this->_menu = $menu;
		$this->_personas = $personas;
		$this->_paquete = $paquete;
		$this->_indicaciones = $indicaciones;
		$this->_estado = $estado;
		$this->id = $id;
	}
	/**
	 * @AttributeType usuario
	 * /**
	 *  * @AssociationType usuario
	 *  * @AssociationKind Composition
	 *  * /
	 */
	public $_unnamed_usuario_;
	//

	public function buscarUsuario()
	{
		$resultado = mysqli_query(conectUser(), "SELECT tipo_documento, numDocumento FROM usuario U INNER JOIN contacto C ON C.correo = '" . $_SESSION["usuario"] . "';");
		return mysqli_fetch_assoc($resultado)["numDocumento"];
	}

	public function reservar()
	{
		$this->generarID();
		mysqli_query(conectUser(), "INSERT INTO especificacion(idcomentario, comentariocol) VALUES (" . $this->getID() . ", '" . $this->getIndicacion() . "');");
		mysqli_query(conectUser(), "INSERT INTO reserva (idreserva, cantpersonas, info_reserva_idinfo, especificacion_idcomentario, estado_idestado, usuario_tipo_documento, usuario_numDocumento) VALUES (" . $this->getID() . ", " . $this->getPersonas() . ", " . $this->getHora() . ", " . $this->getID() . ", 1, '" . $_SESSION["tipoDocumento"] . "', " . $_SESSION["numDocumento"] . ");");
	}

	public function actualizarReserva()
	{
		mysqli_query(conectUser(), "UPDATE reserva SET cantpersonas=" . $this->getPersonas() . " WHERE idreserva = " . $_REQUEST["reservaid"] . "");
		mysqli_query(conectUser(), "UPDATE reserva SET info_reserva_idinfo=" . $this->getHora() . " WHERE idreserva = " . $_REQUEST["reservaid"] . "");
		mysqli_query(conectUser(), "UPDATE especificacion SET comentariocol='" . $this->getIndicacion() . "' WHERE idcomentario = " . $_REQUEST["reservaid"] . "");
	}
	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function verificarFecha()
	{
	}

	/**
	 * @access public
	 * @return boolean
	 * @ReturnType boolean
	 */
	public function verificarHora()
	{
		$resultado = mysqli_query(conectUser(), "SELECT * FROM info_reserva");
		return $resultado;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function seleccionarMenu()
	{
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function verificarEstado()
	{
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function generarID()
	{
		$this->_id = rand();
	}

	#GET

	public function getHora()
	{
		return $this->_hora;
	}
	public function getFecha()
	{
		return $this->_fecha;
	}

	public function getPersonas()
	{
		return $this->_personas;
	}
	public function getPaquete()
	{
		return $this->_paquete;
	}
	public function getIndicacion()
	{
		return $this->_indicaciones;
	}
	public function getMenu()
	{
		return $this->_menu;
	}

	/**
	 * @access public
	 * @return string
	 * @ReturnType string
	 */
	public function getEstado()
	{
		// Not yet implemented
	}

	/**
	 * @access public
	 * @return int
	 * @ReturnType int
	 */
	public function getID()
	{
		return $this->_id;
	}
}
