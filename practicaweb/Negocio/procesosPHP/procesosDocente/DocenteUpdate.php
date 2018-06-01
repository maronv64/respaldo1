<?php 
	
	require_once("../../../instanciarDocente.php");
	

    $idDocente=$_POST['idDocente'];
    $Nombre=$_POST['Nombre'];
    $Direccion=$_POST['Direccion'];
    $Telefono=$_POST['Telefono'];
    $Titulo=$_POST['Titulo'];
    $Sexo=$_POST['Sexo'];
    $TipoContrato=$_POST['TipoContrato']; 
    if (
    	$doc->update($idDocente,$Nombre,$Direccion,$Telefono,$Titulo,$Sexo,$TipoContrato);
    ) {
    	echo $doc->read();
    }

    
 ?>