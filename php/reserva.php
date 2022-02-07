<?php
// require_once(realpath(dirname(__FILE__)) . '/usuario.php');
//
// use usuario;
//session_start();
require_once("usuario.php");
require_once("conexion.php");

extract($_REQUEST);



/**
 * @access public
 * @author stive
 */



class reserva
{
	private $_user;
	private $_fecha;
	private $_hora;
	private $_menu;
	private $_personas;
	private $_paquete;
	private $_indicaciones;
	private $_estado;
	private $_id;

	public function __construct(
		$usuario,
		$fecha,
		$hora,
		$menu,
		$personas,
		$paquete,
		$indicaciones,
		$estado,
	) {
		$this->_user = $usuario;
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
		echo $this->getUser();
		$this->generarID();

		$detalles = "INSERT INTO `detalles`(`idcomentario`, `comentariocol`) 
		VALUES (" . $this->_id . ",'" . $this->getIndicacion() . "')";

		$fecha = "INSERT INTO `fechas_reserva`(`id_fecha`, `fecha`, `estado`) 
		VALUES (" . $this->_id . ", '" . $this->getFecha() . "','ACTIVA')";

		$reserva = "INSERT INTO `reservas`(
			`idreserva`,
			 `cantpersonas`,
			  `estados_idestado`,
			   `horarios_idinfo`,
			    `usuarios_id_usuario`,
				 `fechas_reserva_id_fecha`,
				  `detalles_idcomentario`
				  ) 
				  VALUES (
					  ".$this->_id.",
					  ".$this->getPersonas().",
					  1,
					  ".$this->getHora().",
					  ".$this->getUser().",
					  ".$this->_id.",
					  ".$this->_id."
					  )";
		mysqli_query(conectUser(), $detalles);
		mysqli_query(conectUser(), $fecha);
		mysqli_query(conectUser(), $reserva);
	}

	//Consultar reserva

	static function consultarReserva()
	{

		$query = mysqli_query(conectUser(), "SELECT idreserva, cantpersonas, comentariocol, hora, fecha, estado_reserva, id_usuario, email, p_nombre, p_apellido FROM reservas R INNER JOIN detalles D ON D.idcomentario = R.idreserva INNER JOIN horarios H ON H.id_horario = R.horarios_idinfo INNER JOIN fechas_reserva F ON F.id_fecha = R.idreserva INNER JOIN estados E ON E.idestado = 1 INNER JOIN usuarios U ON U.id_usuario = R.usuarios_id_usuario; ");
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
	static function getDate()
	{

		$date = mysqli_query(conectUser(), "SELECT * FROM info_reserva");

		return $date;
	}

	public function getUser(){
		return $this->_user;
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
