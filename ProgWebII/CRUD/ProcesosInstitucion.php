<?php 
    require_once('../datos/institucion.php');
    require_once("../config/conexion.php");

    $opc = $_POST["opc"];


    $Institucion = new Institucion($conn);

    /***********************************\
    * *
    * Inserta un nuevo registro en la tabla Institucion *
    * opc=1 *
    * *
    \************************************/
    if ($opc==1) {

        
        $Nombre=  $_POST["Nombre"];
        $Ubicacion =  $_POST["Ubicacion"];
        $Codigo =  $_POST["Codigo"];
        $NomRector =  $_POST["NomRector"];
        $Telefono =  $_POST["Telefono"];
        $IdTipoInst = $_POST["IdTipoInst"];

        $codigo_ = $Institucion->Create($Nombre, $Ubicacion, $Codigo, $NomRector, $Telefono, $IdTipoInst);
        //$cod = encrypt_decrypt('encrypt',$codigo_);
        echo json_encode(array('codigo' => $codigo_));

        
    }

    /***********************************\
    * *
    * Modifica un registro en la tabla Institucion *
    * opc=2 *
    * *
    \************************************/
    if ($opc==2) {
        $IdTipoInst =  $_POST["IdTipoInst"];
        $Nombre =  $_POST["Nombre"];
        $Ubicacion =  $_POST["Ubicacion"];
        $Codigo =  $_POST["Codigo"];
        $NomRector =  $_POST["NomRector"];
        $Telefono = $_POST["Telefono"];
        $IdInstitucion = $_POST["IdInstitucion"];

        if($Institucion->Update($IdInstitucion, $Nombre, $Ubicacion, $Codigo, $NomRector, $Telefono, $IdTipoInst)){
            echo $Institucion->Read();
        };

    }


    /***********************************\
    * *
    * Elimina un registro en la tabla Institucion *
    * opc= 3*
    * *
    \************************************/
    if ($opc==3) {

        $IdInstitucion = $_POST["codigo"];

        if($Institucion->Delete($IdInstitucion)){
            echo 1;
        }else{
            echo 0;
        };
    }

    
    /***********************************\
    * *
    * Selecciona todos los registros en la tabla Institucion *
    * opc= 4*
    * *
    \************************************/
    if ($opc==4) {
        echo $Institucion->Read();
    }

    if ($opc==5) {
        $IdInstitucion = $_POST["codigo"];
        echo $Institucion->readWhere($IdInstitucion);
    }

    if ($opc==6) {
        $Nombre = $_POST["busca"];
        echo $Institucion->Busquedad($Nombre);
    }
 ?>