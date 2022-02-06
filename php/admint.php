<?php
require_once("usuarioTrabajador.php");
require_once("conexion.php");

extract($_REQUEST);

class admint extends usuarioTrabajador
{

    public function agregarUsuario()
    {
        mysqli_query(conectUser(), 'INSERT INTO contraseña(idcontraseña, contraseñacol) VALUES ('.$this->getNumdocument().', "'.$this->getContraseña().'")');
        mysqli_query(conectUser(), 'INSERT INTO contacto (idcontacto, telefono, telcelular, correo) VALUES ('.$this->getNumdocument().', '.$this->getNumeroTelefonico().', '.$this->getNumeroCelular().', "'.$this->getEmail().'");');
        mysqli_query(conectUser(), 'INSERT INTO usuario (tipo_documento, numDocumento, p_nombre, s_nombre, p_apellido, s_apellido, contraseña_idcontraseña, rol_usuario_idrol_usuario, contacto_idcontacto) VALUES ("'.$this->getTipodocument().'", '.$this->getNumdocument().', "'.$this->getPnombre().'", "'.$this->getSnombre().'", "'.$this->getPapellido().'", "'.$this->getSapellido().'", '.$this->getNumdocument().', 1, '.$this->getNumdocument().');');
    }
    public function eliminarUsuario()
    {
        mysqli_query(conectUser(), "DELETE FROM reserva WHERE usuario_tipo_documento = '".$_REQUEST["tipo"]."' AND usuario_numDocumento = ".$_REQUEST["numero"]."");
        mysqli_query(conectUser(), "DELETE FROM usuario WHERE numDocumento = ".$_REQUEST["numero"]."");
        mysqli_query(conectUser(), "DELETE FROM contacto WHERE idcontacto = ".$_REQUEST["numero"]."");
        mysqli_query(conectUser(), "DELETE FROM contraseña WHERE idcontraseña = ".$_REQUEST["numero"]."");
    }
}

$addUsT = new admint();
if (isset($_REQUEST["addUserTForm"])) {
    echo "<script>alert('usuario trabajador add user');</script>";
    $addUsT->setPnombre($_REQUEST["Pnombre"]);
    $addUsT->setSnombre($_REQUEST["Snombre"]);
    $addUsT->setPapellido($_REQUEST["Papellido"]);
    $addUsT->setSapellido($_REQUEST["Sapellido"]);
    $addUsT->setTipodocument($_REQUEST["tipoDocumento"]);
    $addUsT->setNumdocument($_REQUEST["numDocumento"]);
    $addUsT->setRol($_REQUEST["rol"]);
    $addUsT->setEmail($_REQUEST["correo"]);
    $addUsT->setNumeroTelefonico($_REQUEST["numTelefono"]);
    $addUsT->setNumeroCelular($_REQUEST["numCelular"]);
    $addUsT->setContraseña($_REQUEST["contraseña"]);
    echo "<script>alert('".$addUsT->getNumdocument()."');</script>";
    $addUsT->agregarUsuario();

    header("Location:../views/admint.php#users");
}

if (isset($_REQUEST["numero"])) {
    echo "<script>alert('Hola')</script>";
    $addUsT->eliminarUsuario();
    //header("Location:../views/admint.php#users");
}
