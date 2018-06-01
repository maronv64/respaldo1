<?php 

	include('../AccesoDatos/conexion.php');
	include('../AccesoDatos/objetosBD/Docente.php');

	$doc=new Docente($conn);

	echo $doc->read();
//	echo $doc->create("Hola","Arrastradero","00000","licd","Masculino","1");
//	$doc->update("5","Ho00000aa","Arrastradero","00000","licd","Masculino","1");
//	$doc->delete("6");
	echo "-----------------------------";
	echo "-----------------------------";
	echo $doc->buscar("7");
//	echo "hola";

 ?>