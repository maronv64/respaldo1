<?php 
	require_once('../datos/TipoInstitucion.php');
    require_once("../config/conexion.php");
    $TipoInst=new TipoInstitucion($conn);
    echo $TipoInst->ObtenerTipoInst();
 ?>