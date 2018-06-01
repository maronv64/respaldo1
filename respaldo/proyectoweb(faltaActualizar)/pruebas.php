<?php 

	include('Configuracion/conexion.php');
	include('Datos/Docente.php');

    $doc=new Docente($conn);
    
    //echo $doc->BuscarItem("Maron");
    echo $doc->create("hola","hola","hola","hola","hola","1");
 ?>