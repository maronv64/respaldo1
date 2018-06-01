<?php 

	// Motrar todos los errores de PHP
	//error_reporting(-1);

	require_once("../datosBD/config.php");
	require_once('../seguridad/cryptografia.php');   
	require_once("../seguridad/sesion.class.php"); 
	require_once('../datosBD/config.php');


	$opc = $_POST["opc"];


	/***********************************\
	* *
	* Inserta un nuevo registro en la tabla persona *
	* opc=1 *
	* *
	\************************************/
	if ($opc==1) {

		$tipoPersona =  $_POST["tipoPersona"];
		$identificacion =  $_POST["identificacion"];
		$nombre =  $_POST["nombre"];
		$apellido =  $_POST["apellido"];
		$usuario =  $_POST["usuario"];
		$fechanacimiento = $_POST["fechaNacimiento"];

		$codigo_ = $persona->crear($identificacion, $nombre, $apellido, $usuario, $fechanacimiento, $tipoPersona);
    	//$cod = encrypt_decrypt('encrypt',$codigo_);
		echo json_encode(array('codigo' => $codigo_));

		
	}

	/***********************************\
	* *
	* Modifica un registro en la tabla persona *
	* opc=2 *
	* *
	\************************************/
	if ($opc==2) {
		$idtipo =  $_POST["tipoPersona"];
		$identificacion =  $_POST["identificacion"];
		$nombre =  $_POST["nombre"];
		$apellido =  $_POST["apellido"];
		$usuario =  $_POST["usuario"];
		$fechanacimiento = $_POST["fechaNacimiento"];
		$idpersona = $_POST["codigo"];

		if($persona->actualizar($idpersona, $identificacion, $nombre, $apellido, $usuario, $fechanacimiento, $idtipo)){
			echo $persona->obtenerPersonas();
		};

	}


	/***********************************\
	* *
	* Elimina un registro en la tabla persona *
	* opc= 3*
	* *
	\************************************/
	if ($opc==3) {

		$idpersona = $_POST["codigo"];

		if($persona->eliminar($idpersona)){
			echo 1;
		}else{
			echo 0;
		};
	}

	
	/***********************************\
	* *
	* Selecciona todos los registros en la tabla persona *
	* opc= 4*
	* *
	\************************************/
	if ($opc==4) {
		echo $persona->obtenerPersonas();
	}


	?> 
