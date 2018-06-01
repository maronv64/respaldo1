<?php 

	/***********************************\
	* *
	* Clase que permite realizar las operaciones CRUD de la tabla tipopersona *
	* Create, Read, Update, Delete*
	* *
	\************************************/
	Class TipoPersona {

		private $_db;

	function __construct($db){
			$this->_db = $db;
	}


	/***********************************\
	* *
	* Funcion que retorna un JSON con todos los registros de la tabla tipopersona *
	* *
	* *
	\************************************/
	public function obtener(){
					$query = "SELECT `tipopersona`.`idtipo`,`tipopersona`.`descripcion` 
					FROM `septimosemestre`.`tipopersona`;";

					$sentencia = $this->_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
					$sentencia->execute();

					$datos = array();

					while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

							$dato = array();
							$dato['idtipo'] = $fila[0];
							$dato['descripcion'] = $fila[1];
							$datos[] = $dato;

					}

					$sentencia = null;
					return json_encode($datos);
	}
	
}
	
?> 
