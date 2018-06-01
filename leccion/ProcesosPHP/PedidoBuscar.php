<?php 

	include('../Configuracion/conexion.php');
	include('../Datos/pedido.php');
    $v=$_POST["item"];
    
    $doc=new Pedido($conn);
   
    echo $doc->BuscarItem($v);
    
 ?>