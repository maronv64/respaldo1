<?php 

	include('../Configuracion/conexion.php');
	include('../Datos/pedido.php');

    $doc=new Pedido($conn);
    echo $doc->read();
    
 ?>