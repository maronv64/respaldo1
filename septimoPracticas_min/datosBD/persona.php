<?php 


	/***********************************\
	* *
	* Clase que permite realizar las operaciones CRUD de la tabla persona *
	* Create, Read, Update, Delete*
	* *
	\************************************/
Class Persona {

	private $_db;

	function __construct($db){
			$this->_db = $db;
	}

	/***********************************\
	* *
	* Funcion que retorna un JSON con todos los registros de la tabla persona *
	* *
	* *
	\************************************/
	public function obtenerPersonas() {
		 	$query = "SELECT `persona`.`idpersona`,
		    `persona`.`identificacion`,
		    `persona`.`nombre`,
		    `persona`.`apellido`,
		    `persona`.`usuario`,
		    `persona`.`fechanacimiento`,
		    `persona`.`idtipo`
		FROM `septimosemestre`.`persona`;";

			  try {

			    $sentencia = $this->_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			    $sentencia->execute();

			    $objPersonas = array();
			    
				while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

				    	$persona = array();
					    $persona['idpersona'] = $fila[0];
					    $persona['identificacion'] = $fila[1];
					    $persona['nombre'] = $fila[2];
					    $persona['apellido'] = $fila[3];
					    $persona['usuario'] = $fila[4];
					    $persona['fechanacimiento'] = $fila[5];
					    $persona['idtipo'] = $fila[6];
					    $objPersonas[] = $persona;

				}

				$sentencia = null;
				return json_encode($objPersonas);

			  }

		  catch (PDOException $e) {
		    print $e->getMessage();
		  }
		}


	/***********************************\
	* *
	* Funcion que obtiene un registro identificado por el parametro $id, corresponde a la clave primaria de la tabla persona *
	* Parameter: $id INTEGER*
	* *
	\************************************/
	public function obtenerPersonaPorId($id) {
		 	$query = "SELECT `persona`.`idpersona`,
		    `persona`.`identificacion`,
		    `persona`.`nombre`,
		    `persona`.`apellido`,
		    `persona`.`usuario`,
		    `persona`.`fechanacimiento`
		FROM `septimosemestre`.`persona` where `persona`.`idpersona` = $id;";
			  try {

			    $sentencia = $this->_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			    $sentencia->execute();

			    $objPersonas = array();
			    
				while ($fila = $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {

				    	$persona = array();
					    $persona['idpersona'] = $fila[0];
					    $persona['identificacion'] = $fila[1];
					    $persona['nombre'] = $fila[2];
					    $persona['apellido'] = $fila[3];
					    $persona['usuario'] = $fila[4];
					    $persona['fechanacimiento'] = $fila[5];
					    $objPersonas[] = $persona;

				}

				$sentencia = null;
				return json_encode($objPersonas);

			  }

		  catch (PDOException $e) {
		    print $e->getMessage();
		  }

		}

	/***********************************\
	* *
	* Funcion que inserta un registro en la tabla persona y retorna el identificador del registro insertado*
	* Parameter: $identificacion VARCHAR*
	* 			 $nombre VARCHAR*
	* 			 $apellido VARCHAR*
	* 			 $usuario VARCHAR*
	* 			 $fechanacimiento DATE*
	* 			 $idtipo INTEGER Clave forenea de tabla tipopersona*
	* *
	\************************************/
	   public function crear($identificacion, $nombre, $apellido, $usuario, $fechanacimiento, $idtipo)
		{

			$sql = "INSERT INTO `persona`
					( `identificacion`, `nombre`,`apellido`,`usuario`,`fechanacimiento`, `idtipo`)
				VALUES (:identificacion,:nombre,:apellido,:usuario,:fechanacimiento, :idtipo)";

	        try {

			 	$stmt = $this->_db->prepare($sql);
				
				//bindParam: Vincula un parámetro al nombre de variable especificado
				$stmt->bindParam(':identificacion', $identificacion, PDO::PARAM_STR);       
				$stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR); 
				$stmt->bindParam(':apellido', $apellido, PDO::PARAM_STR);       
				$stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR); 
				$stmt->bindParam(':fechanacimiento', $fechanacimiento, PDO::PARAM_STR);   
				$stmt->bindParam(':idtipo', $idtipo, PDO::PARAM_STR);       
				
				//PDOStatement::execute — Ejecuta una sentencia preparada
				//Devuelve TRUE en caso de éxito o FALSE en caso de error.
				if($stmt->execute())
					{
						return $this->_db->lastInsertId();
					}
				else
					{
						return 0;
					}
					
			  	}

		 	catch (PDOException $e) {
		    	print $e->getMessage();
		  	}                       
			
		}

	/***********************************\
	* *
	* Funcion que actualiza un registro en la tabla persona y retorna el true o false en caso de exito o fallo de la transaccion respectivamente*
	* Parameter: $idpersona INTEGER Clave primaria de tabla persona*
	*			 $identificacion VARCHAR*
	* 			 $nombre VARCHAR*
	* 			 $apellido VARCHAR*
	* 			 $usuario VARCHAR*
	* 			 $fechanacimiento DATE*
	* 			 $idtipo INTEGER Clave forenea de tabla tipopersona*
	* *
	\************************************/
		public function actualizar($idpersona, $identificacion, $nombre, $apellido, $usuario, $fechanacimiento, $idtipo)
		{

				$sql = "UPDATE `septimosemestre`.`persona`
						SET
						`identificacion` = '$identificacion',
						`nombre` = '$nombre',
						`apellido` = '$apellido',
						`usuario` = '$usuario',
						`fechanacimiento` = '$fechanacimiento',
						`idtipo` = $idtipo
						WHERE `idpersona` = $idpersona;
						";
	                                          
				$stmt = $this->_db->prepare($sql);
				                                             
				if($stmt->execute())
					{
						return true;
					}
				else
					{
						return false;
					}
		}

	/***********************************\
	* *
	* Funcion que elimina un registro identificado por el parametro $id, corresponde a la clave primaria de la tabla persona *
	* Parameter: $id INTEGER*
	* *
	\************************************/
		public	function eliminar($id)
			{
					$sql = "DELETE FROM `persona` WHERE idpersona = $id";
		                                          
					$stmt = $this->_db->prepare($sql);
					                                              
					if($stmt->execute())
						{
							return true;
						}
					else
						{
							return false;
						}
			}





	}



?> 