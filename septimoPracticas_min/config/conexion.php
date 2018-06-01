<?php 

	
	/***********************************\
	* *
	* Permite definir los parametros de conexion con la base de datos *
	* Create, Read, Update, Delete*
	* *
	\************************************/

  	$dsn = 'mysql:dbname=septimosemestre;host=localhost;charset=utf8';
	$dbuser = 'root'; 
	$dbuserpw = ''; 

	try
	{
	    $conn = new PDO($dsn, $dbuser, $dbuserpw);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //echo "Coneccion realizada";
	}
	catch (PDOException $e)
	{
	    echo 'There was a problem connecting to the database: ' . $e->getMessage();
	}

		
	?> 

