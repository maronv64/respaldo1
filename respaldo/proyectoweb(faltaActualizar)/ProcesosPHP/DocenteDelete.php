<?php 

	include('../Configuracion/conexion.php');
    include('../Datos/Docente.php');
    
	$idDocente=$_POST['item'];
    $doc=new Docente($conn);
    
    if( $doc->delete($idDocente))
    {
    	echo 1;
    }else{
    	echo 0;
    }


 ?>