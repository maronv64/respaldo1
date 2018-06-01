<?php 
class Docente{

	private $db;
	
	function __construct($Pdb)
	{
		$this->db=$Pdb;
	}

	function read(){
		$consulta = "

                        SELECT `Docente`.`idDocente`,
                        `Docente`.`Nombre`,
                        `Docente`.`Direccion`,
                        `Docente`.`Telefono`,
                        `Docente`.`Titulo`,
                        `Docente`.`Sexo`,
                        `Docente`.`idTipoContrato`,
                        `TipoContrato`.`Descripcion`
                            FROM `practicaweb`.`Docente` inner join `practicaweb`.`TipoContrato`
                                on `Docente`.`idTipoContrato`=`TipoContrato`.`idTipoContrato`;
                    ";


			try {
				
				$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();

				$objDocente = array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					# code...
					$Docente= array();

					$Docente['idDocente']=$fila[0];
					$Docente['Nombre']=$fila[1];
					$Docente['Direccion']=$fila[2];
					$Docente['Telefono']=$fila[3];
					$Docente['Titulo']=$fila[4];
					$Docente['Sexo']=$fila[5];
					$Docente['idTipoContrato']=$fila[6];
                    $Docente['Descripcion']=$fila[7];

					$objDocente[]=$Docente;

				}

				return json_encode($objDocente);

			} catch (PDOException $e) {
				print $e->getMessage();
			}
	}

	function readTipoContrato(){
		$consulta = "

                        SELECT *
                            FROM `practicaweb`.`TipoContrato`
                    ";


			try {
				
				$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();

				$objDocente = array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					# code...
					$Docente= array();

					$Docente['idTipoContrato']=$fila[0];
					$Docente['Descripcion']=$fila[1];

					$objDocente[]=$Docente;

				}

				return json_encode($objDocente);

			} catch (PDOException $e) {
				print $e->getMessage();
			}
	}


	function create($Nombre,$Direccion,$Telefono,$Titulo,$Sexo,$idTipoContrato)
	{
			$sql="INSERT INTO Docente
							(
							 Nombre,
							 Direccion,
							 Telefono,
							 Titulo,
							 Sexo,
							 idTipoContrato)
							values(
								:Nombre,
								:Direccion,
								:Telefono,
								:Titulo,
								:Sexo,
								:idTipoContrato)";
			try {
				$stmt=$this->db->prepare($sql);
				
				$stmt->bindParam(':Nombre',$Nombre,PDO::PARAM_STR);
				$stmt->bindParam(':Direccion',$Direccion,PDO::PARAM_STR);
				$stmt->bindParam(':Telefono',$Telefono,PDO::PARAM_STR);
				$stmt->bindParam(':Titulo',$Titulo,PDO::PARAM_STR);
				$stmt->bindParam(':Sexo',$Sexo,PDO::PARAM_STR);
				$stmt->bindParam(':idTipoContrato',$idTipoContrato,PDO::PARAM_STR);

				if($stmt->execute()) {
					return $this->db->lastInsertId();
				}else{
					return 0;
				}
				
			} catch (PDOException $e) {
				print $e->getMessage();
			}		
	}
	
	function update($idDocente,$Nombre,$Direccion,$Telefono,$Titulo,$Sexo,$idTipoContrato)
	{
		$sql="UPDATE Docente
					SET
					Nombre = :Nombre,
					Direccion = :Direccion,
					Telefono = :Telefono,
					Titulo = :Titulo,
					Sexo = :Sexo,
					idTipoContrato = :idTipoContrato
					WHERE idDocente = :idDocente";

		try {
				$stmt = $this->db->prepare($sql);
				
				$stmt->bindParam(':Nombre',$Nombre,PDO::PARAM_STR);
				$stmt->bindParam(':Direccion',$Direccion,PDO::PARAM_STR);
				$stmt->bindParam(':Telefono',$Telefono,PDO::PARAM_STR);
				$stmt->bindParam(':Titulo',$Titulo,PDO::PARAM_STR);
				$stmt->bindParam(':Sexo',$Sexo,PDO::PARAM_STR);
				$stmt->bindParam(':idTipoContrato',$idTipoContrato,PDO::PARAM_STR);
				$stmt->bindParam(':idDocente',$idDocente,PDO::PARAM_STR);

				if($stmt->execute()) {
					return true;
				}else{
					return false;
				}
				
			} catch (PDOException $e) {
				print $e->getMessage();
			}
	}
	function delete($idDocente)
	{
		$sql="DELETE FROM Docente
				WHERE idDocente = :idDocente";
		try {
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':idDocente', $idDocente, PDO::PARAM_STR);  
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			print $e->getMessage();
		}
	}

	function Buscar($idDocente){
		$consulta = "

						SELECT idDocente,
						     Nombre,
						     Direccion,
						     Telefono,
						     Titulo,
						     Sexo,
						     idTipoContrato
							FROM Docente WHERE idDocente = :idDocente";


			try {
				
				$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->bindParam(':idDocente', $idDocente, PDO::PARAM_STR);  
				$sentencia->execute();

				$objDocente = array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {

					$Docente= array();

					$Docente['idDocente']=$fila[0];
					$Docente['Nombre']=$fila[1];
					$Docente['Direccion']=$fila[2];
					$Docente['Telefono']=$fila[3];
					$Docente['Titulo']=$fila[4];
					$Docente['Sexo']=$fila[5];
					$Docente['idTipoContrato']=$fila[6];

					$objDocente[]=$Docente;

				}

				return json_encode($objDocente);

			} catch (PDOException $e) {
				print $e->getMessage();
			}
	}

	function BuscarItem($item){
		$consulta = "
		
								SELECT `Docente`.`idDocente`,
								`Docente`.`Nombre`,
								`Docente`.`Direccion`,
								`Docente`.`Telefono`,
								`Docente`.`Titulo`,
								`Docente`.`Sexo`,
								`Docente`.`idTipoContrato`,
								`TipoContrato`.`Descripcion`
									FROM `practicaweb`.`Docente` inner join `practicaweb`.`TipoContrato`
										on `Docente`.`idTipoContrato`=`TipoContrato`.`idTipoContrato`
										where `Docente`.`Nombre` like '%".$item."%'
										;
							";
		
		
					try {
						
						$sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
						$sentencia->execute();
		
						$objDocente = array();
		
						while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
							# code...
							$Docente= array();
		
							$Docente['idDocente']=$fila[0];
							$Docente['Nombre']=$fila[1];
							$Docente['Direccion']=$fila[2];
							$Docente['Telefono']=$fila[3];
							$Docente['Titulo']=$fila[4];
							$Docente['Sexo']=$fila[5];
							$Docente['idTipoContrato']=$fila[6];
							$Docente['Descripcion']=$fila[7];
		
							$objDocente[]=$Docente;
		
						}
		
						return json_encode($objDocente);
		
					} catch (PDOException $e) {
						print $e->getMessage();
					}
	}

}
 ?>