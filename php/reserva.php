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
	) {
		$this->_fecha = $fecha;
		$this->_hora = $hora;
		$this->_menu = $menu;
		$this->_personas = $personas;
		$this->_paquete = $paquete;
		$this->_indicaciones = $indicaciones;
		$this->_estado = $estado;
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

	public function reservar()
	{
		$this->generarID();
		$info_reserva = "INSERT INTO `info_reserva`(`idinfo`, `hora`, `fecha`)
		VALUES (" . $this->_id . ",'" . $this->getHora() . "','" . $this->getHora() . "')";

		$detalles = "INSERT INTO `especificacion`(`idcomentario`, `comentariocol`) 
		VALUES (".$this->_id.",'".$this->getIndicacion()."')";

		$reserva = "INSERT INTO `reserva`(`idreserva`, `cantpersonas`, `info_reserva_idinfo`, `especificacion_idcomentario`, `estado_idestado`, `usuario_id`) 
		VALUES (".$this->_id.", ".$this->getPersonas().", ".$this->_id.", ".$this->_id.", 1, ".$_SESSION['userID'].")";

		mysqli_query(conectUser(), $info_reserva);
		mysqli_query(conectUser(), $detalles);
		mysqli_query(conectUser(), $reserva);
	}

	//Consultar reserva

	static function consultarReserva(){

		$query = mysqli_query(conectUser(), "SELECT idreserva, cantpersonas, comentariocol, hora, fecha, estado, id_usuario, email, p_nombre, p_apellido 
		FROM reserva R INNER JOIN especificacion E ON E.idcomentario = R.idreserva 
		INNER JOIN info_reserva I ON I.idinfo = R.idreserva 
		INNER JOIN estado ES ON ES.idestado = 1 
		INNER JOIN usuario ON R.usuario_id = usuario_id");
		return $query;
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
	 * @return int
	 * @ReturnType int
	 */
	public function getID()
	{
		return $this->_id;
	}
}
