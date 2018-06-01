<?php 
	class TipoInstitucion{
	private $db;

	function __construct($Pdb)
	{
		$this->db=$Pdb;
	}
		function ObtenerTipoInst(){
			$consulta="SELECT * FROM tipoinstitucion";
			try {
				$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objTipoInstitucion=array();
				while($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
				$Inst=array();
				$Inst['IdTipoInst']=$fila[0];
				$Inst['Descripcion']=$fila[1];
				$objTipoInstitucion[]=$Inst;
			}
			return json_encode($objTipoInstitucion);
			} catch (PDOException $e) {
				print $e->getMessage();
			}
		}
	}
 ?>