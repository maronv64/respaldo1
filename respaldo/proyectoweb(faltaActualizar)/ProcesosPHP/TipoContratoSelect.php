<?php 

	include('../Configuracion/conexion.php');
	include('../Datos/Docente.php');

    $doc=new Docente($conn);
    echo $doc->readTipocontrato();
    
 ?> 