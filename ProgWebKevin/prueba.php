<?php 
include('config/conexion.php');
include('datos/institucion.php');
//include('CRUD/IngresarInstitucion.php');
//include('CRUD/MostrarInstitucion.php');
//include('CRUD/EliminarInstitucion.php');
//include('CRUD/ModificarInstitucion.php');
$insti= new Institucion($conn);
//$insti->Update(8,'UNESUM','JIPIJAPA','005','LUIS SOLIZ','09999999999','1');
//$insti->Delete(9);	
//echo $insti->Read();
//$insti->Create('NULL','NULL','NULL','NULL','NULL','NULL');

echo $insti->Busquedad("E");
 ?>