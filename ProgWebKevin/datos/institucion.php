<?php 
/**
* Catalogo, Clase y CRUD
*/
class Institucion{
	private $db;

	function __construct($Pdb)
	{
		$this->db=$Pdb;
	}

/*
Creacion de CRUD para la clase Institucion
*/
	function Create($Nombre,$Ubicacion,$Codigo,$NomRector,$Telefono,$IdTipoInst){
		$sql="INSERT INTO intitucion
		(Nombre,Ubicacion,Codigo,NomRector,Telefono,IdTipoInst)
		values (:Nombre,:Ubicacion,:Codigo,:NomRector,:Telefono,:IdTipoInst)";
		try {
			$stmt=$this->db->prepare($sql);
			$stmt->bindParam(':Nombre', $Nombre, PDO::PARAM_STR);
			$stmt->bindParam(':Ubicacion',$Ubicacion,PDO::PARAM_STR);
			$stmt->bindParam(':Codigo',$Codigo,PDO::PARAM_STR);
			$stmt->bindParam(':NomRector',$NomRector,PDO::PARAM_STR);
			$stmt->bindParam(':Telefono',$Telefono,PDO::PARAM_STR);
			$stmt->bindParam(':IdTipoInst',$IdTipoInst,PDO::PARAM_STR);
			if ($stmt->execute()) {
				return $this->db->lastInsertId();
			}else{
				return 0;
			}
		} catch (PDOException $e) {
			print $e->getMessage();
		}
	}

	function Read(){
		$consulta="SELECT IdInstitucion,
    					Nombre,
					    Ubicacion,
					    Codigo,
					    NomRector,
					    Telefono,
					    IdTipoInst
						FROM intitucion";
		try {
			$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			$sentencia->execute();
			$objInstitucion=array();
			while($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
				$Inst=array();
				$Inst['IdInstitucion']=$fila[0];
				$Inst['Nombre']=$fila[1];
				$Inst['Ubicacion']=$fila[2];
				$Inst['Codigo']=$fila[3];
				$Inst['NomRector']=$fila[4];
				$Inst['Telefono']=$fila[5];
				$Inst['IdTipoInst']=$fila[6];
				$objInstitucion[]=$Inst;
			}
			return json_encode($objInstitucion);

		} catch (PDOException $e) {
				print $e->getMessage();
		}
	}

	function Update($IdInstitucion,$Nombre,$Ubicacion,$Codigo,$NomRector,$Telefono,$IdTipoInst){
		$sql="UPDATE intitucion
				SET
				Nombre = :Nombre ,
				Ubicacion = :Ubicacion ,
				Codigo = :Codigo ,
				NomRector = :NomRector ,
				Telefono = :Telefono ,
				IdTipoInst =:IdTipoInst 
				WHERE IdInstitucion = :IdInstitucion";
		try {
			$stmt = $this->db->prepare($sql);                                  			
			$stmt->bindParam(':Nombre', $Nombre, PDO::PARAM_STR);       
			$stmt->bindParam(':Ubicacion', $Ubicacion, PDO::PARAM_STR);    
			$stmt->bindParam(':Codigo', $Codigo, PDO::PARAM_STR);  
			$stmt->bindParam(':NomRector', $NomRector, PDO::PARAM_STR); 
			$stmt->bindParam(':Telefono', $Telefono, PDO::PARAM_STR);   
			$stmt->bindParam(':IdTipoInst', $IdTipoInst, PDO::PARAM_INT);
			$stmt->bindParam(':IdInstitucion', $IdInstitucion, PDO::PARAM_INT);
			if ($stmt->execute()) {
			   return true;
		   }else{
		   		return false;
		   }   
		} catch (PDOException $e) {
			print $e->getMessage();
		}
	}

	function Delete($IdInstitucion){
		$sql="DELETE FROM intitucion
				WHERE IdInstitucion = :IdInstitucion";
		try {
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':IdInstitucion', $IdInstitucion, PDO::PARAM_STR);  
			if ($stmt->execute()) {
				return true;
			}else{
				return false;
			}
		} catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	function consultaNueva(){
		$consulta="SELECT 
							IdInstitucion,
	    					Nombre,
						    Ubicacion,
						    Codigo,
						    NomRector,
						    Telefono,
						    tipoinstitucion.IdTipoInst,
						    Descripcion
		FROM intitucion INNER JOIN tipoinstitucion ON intitucion.IdTipoInst=tipoinstitucion.IdTipoInst";
			try {
				$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objInstitucion=array();
				while($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
					$Inst=array();
					$Inst['IdInstitucion']=$fila[0];
					$Inst['Nombre']=$fila[1];
					$Inst['Ubicacion']=$fila[2];
					$Inst['Codigo']=$fila[3];
					$Inst['NomRector']=$fila[4];
					$Inst['Telefono']=$fila[5];
					$Inst['IdTipoInst']=$fila[6];
					$Inst['Descripcion']=$fila[7];
					$objInstitucion[]=$Inst;
				}
				return json_encode($objInstitucion);

			} catch (PDOException $e) {
					print $e->getMessage();
			}
	}
	function readWhere($IdInstitucion){

		$consulta= "
		SELECT IdInstitucion,
		Nombre,
		Ubicacion,
		Codigo,
		NomRector,
		Telefono,
		IdTipoInst
		FROM intitucion
		WHERE IdInstitucion=:IdInstitucion";
		try {
			
		 
		$sentencia= $this->db->prepare($consulta, array(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL));
		$sentencia->bindParam(':IdInstitucion', $IdInstitucion, PDO::PARAM_STR);

		$sentencia->execute();

		$objInstitucion=array();
		while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
			$institucion=array();
			$institucion['IdInstitucion']= $fila[0];
			$institucion['Nombre']= $fila[1];
			$institucion['Ubicacion']= $fila[2];
			$institucion['Codigo']= $fila[3];
			$institucion['NomRector']= $fila[4];
			$institucion['Telefono']= $fila[5];
			$institucion['IdTipoInst']= $fila[6];
			$objInstitucion[]= $institucion;
		}

		$sentencia=null;
		return json_encode($objInstitucion);
}
		catch (PDOException $e) {
			print $e->getMessage();
		}
	}
	function Busquedad($var){
		$consulta="SELECT IdInstitucion,
    					Nombre,
					    Ubicacion,
					    Codigo,
					    NomRector,
					    Telefono,
					    IdTipoInst
						FROM intitucion WHERE Nombre LIKE '".$var."%'";
		try {
			$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
			$sentencia->execute();
			$objInstitucion=array();
			while($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
				$Inst=array();
				$Inst['IdInstitucion']=$fila[0];
				$Inst['Nombre']=$fila[1];
				$Inst['Ubicacion']=$fila[2];
				$Inst['Codigo']=$fila[3];
				$Inst['NomRector']=$fila[4];
				$Inst['Telefono']=$fila[5];
				$Inst['IdTipoInst']=$fila[6];
				$objInstitucion[]=$Inst;
			}
			return json_encode($objInstitucion);

		} catch (PDOException $e) {
				print $e->getMessage();
		}
	}

		
}

 ?>