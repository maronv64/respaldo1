<?php 
	
	Class TipoContrato{

		private $db; 

		function _construct($par_db){
			$this->db = $par_db;
		}

		function read()
		{

			$consulta = "

						SELECT `idTipoContrato`,
							   `Descripcion`
							FROM `TipoContrato`;

					";

			$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$sentencia->execute();

			try {
				
				$objDocente = array();

				while ($fila= $sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
					# code...
					$Docente= array();

					$Docente['idTipoContrato']=$fila[0];
					$Docente['Descripcion']=$fila[1];

					$objDocente[]=$Docente;

				}

				return json_encode($objDocente)

			} catch (Exception $e) {
				print("dsdsd");
			}
		}

		function update($idTipoContrato_,$Descripcion_)
		{
			$consulta ="

						UPDATE `TipoContrato`
							SET
							`Descripcion` = $Descripcion_,
							WHERE `idTipoContrato` = $idTipoContrato_;
					";

			$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$sentencia->execute();
		}

		function delete($idTipoContrato_)
		{
			$consulta = "
						DELETE FROM `TipoContrato`
							WHERE `idTipoContrato`=$idTipoContrato_;
						";

			$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$sentencia->execute();
		}

		function create($Descripcion_)
		{
			$consulta = "

						INSERT INTO `TipoContrato`
							(
							`Descripcion`
							)
							VALUES(
								$Descripcion_
								);

						";
			
			$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$sentencia->execute();
		}

	}

 ?>