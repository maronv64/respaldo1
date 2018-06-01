<?php 
	require_once("../../../instanciarDocente.php");

	$idDocente=$_POST['idDocente'];

    if( $doc->delete($idDocente))
    {
    	echo 1;
    }else{
    	echo 0;
    }


 ?>