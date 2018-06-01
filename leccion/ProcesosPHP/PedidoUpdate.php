<?php 
	include('../Configuracion/conexion.php');
	include('../Datos/pedido.php');

    $id=$_POST['id'];
    $pedNumero=$_POST['pedNumero'];
    $pedPrecioTotal=$_POST['pedPrecioTotal'];
    $pedDescuento=$_POST['pedDescuento'];
    $pedIva=$_POST['pedIva'];



    $ped=new Pedido($conn);
    $id_ = $doc->create($id,$pedNumero,$pedPrecioTotal,$pedDescuento,$pedIva);
    //$id_ = $ped->create("30","30","30","30");
    //echo json_decode(array('id'=> $id_));
    //echo json_decode(array('codig'=>$id_));
    //echo "hola";
    //echo $id_;
 ?>