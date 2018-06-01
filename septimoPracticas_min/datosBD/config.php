<?php
	require_once('tipoPersona.php');
	require_once('persona.php');
	require_once("../config/conexion.php");

	$persona = new Persona($conn);
	$tipopersona = new TipoPersona($conn);
		
?>
