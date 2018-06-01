<?php 

	include('Configuracion/conexion.php');
	include('Datos/pedido.php');

    $ped=new Pedido($conn);
    
    //$ped->create("dsds","20","10","2");
    //$ped->update("2","hola","20","10","2");    
    
    //echo $ped->read();
    echo "-----------------------";
    //$ped->delete("3");
    //$ped->buscarItem("ho");
    //echo "ho";
    echo $ped->read();
    

 ?>