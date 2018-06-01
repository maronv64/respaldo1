<<?php 
// Motrar todos los errores de PHP
	//error_reporting(-1);

	require_once("../Configuracion/conexion.php");
	//require_once('../seguridad/cryptografia.php');   
	//require_once("../seguridad/sesion.class.php"); 
	require_once('../Datos/Institucion.php');


	$opc = $_POST["opc"];


	/***********************************\
	* *
	* Inserta un nuevo registro en la tabla Institucion *
	* opc=1 *
	* *
	\************************************/
	if ($opc==1) {

		
		$Nombre=  $_POST["Nombre"];
		$Ubicacion =  $_POST["Ubicacion"];
		$Codigo =  $_POST["Codigo"];
		$NomRector =  $_POST["NomRector"];
		$Telefono =  $_POST["Telefono"];
		$IdTipoInst = $_POST["IdTipoInst"];

		$codigo_ = $Institucion->Create($Nombre, $Ubicacion, $Codigo, $NomRector, $Telefono, $IdTipoInst);
    	//$cod = encrypt_decrypt('encrypt',$codigo_);
		echo json_encode(array('codigo' => $codigo_));

		
	}

	/***********************************\
	* *
	* Modifica un registro en la tabla Institucion *
	* opc=2 *
	* *
	\************************************/
	if ($opc==2) {
		$IdTipoInst =  $_POST["IdTipoInst"];
		$Nombre =  $_POST["Nombre"];
		$Ubicacion =  $_POST["Ubicacion"];
		$Codigo =  $_POST["Codigo"];
		$NomRector =  $_POST["NomRector"];
		$Telefono = $_POST["Telefono"];
		$IdInstitucion = $_POST["IdInstitucion"];

		if($Institucion->Update($IdInstitucion, $Nombre, $Ubicacion, $Codigo, $NomRector, $Telefono, $IdTipoInst)){
			echo $Institucion->Read();
		};

	}


	/***********************************\
	* *
	* Elimina un registro en la tabla Institucion *
	* opc= 3*
	* *
	\************************************/
	if ($opc==3) {

		$IdInstitucion = $_POST["Codigo"];

		if($Institucion->Delete($IdInstitucion)){
			echo 1;
		}else{
			echo 0;
		};
	}

	
	/***********************************\
	* *
	* Selecciona todos los registros en la tabla Institucion *
	* opc= 4*
	* *
	\************************************/
	if ($opc==4) {
		echo $Institucion->Read();
	}
 ?>