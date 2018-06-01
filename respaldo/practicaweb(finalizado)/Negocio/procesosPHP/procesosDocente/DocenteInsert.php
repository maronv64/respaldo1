<?php 
	require_once("../../../instanciarDocente.php");

    $Nombre=$_POST['Nombre'];
    $Direccion=$_POST['Direccion'];
    $Telefono=$_POST['Telefono'];
    $Titulo=$_POST['Titulo'];
    $Sexo=$_POST['Sexo'];
    $TipoContrato=$_POST['TipoContrato']; 

    $id_ = $doc->create($Nombre,$Direccion,$Telefono,$Titulo,$Sexo,$TipoContrato);

    echo json_encode(array('id'=> $id_));

 ?>