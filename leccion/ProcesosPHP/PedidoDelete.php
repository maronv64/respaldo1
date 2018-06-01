<?php 

	include('../Configuracion/conexion.php');
    include('../Datos/pedido.php');
    
	$id=$_POST['item'];
    $doc=new Pedido($conn);
    
    if( $doc->delete($id))
    {
    	echo 1;
    }else{
    	echo 0;
    }


 ?>