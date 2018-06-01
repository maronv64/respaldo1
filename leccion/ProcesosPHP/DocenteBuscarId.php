<?php 

	include('../Configuracion/conexion.php');
	include('../Datos/Docente.php');
    $v=$_POST["item"];
    
    $doc=new Docente($conn);
    //echo $doc->read();

    echo $doc->BuscarId($v);
    
 ?>