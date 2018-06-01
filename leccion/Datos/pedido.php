<?php
    class Pedido{
        private $db;
        
        function __construct($Pdb)
        {
            $this->db=$Pdb;
        }
        
        function read()
        {
            $consulta = "
    
                            SELECT `pedido`.`id`,
                            `pedido`.`pedNumero`,
                            `pedido`.`pedPrecioTotal`,
                            `pedido`.`pedDescuento`,
                            `pedido`.`pedIva`
                            FROM `prueba`.`pedido`;
                        ";
    
    
                try {
                    
                    $sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
                    $sentencia->execute();
    
                    $objPedido = array();
    
                    while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
                        # code...
                        $Pedido= array();
    
                        $Pedido['id']=$fila[0];
                        $Pedido['pedNumero']=$fila[1];
                        $Pedido['pedPrecioTotal']=$fila[2];
                        $Pedido['pedDescuento']=$fila[3];
                        $Pedido['pedIva']=$fila[4];
                        
                        $objPedido[]=$Pedido;
    
                    }
    
                    return json_encode($objPedido);
    
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
        }
        
        function create($pedNumero,$pedPrecioTotal,$pedDescuento,$pedIva)
        {
                $sql="INSERT INTO pedido
                                (
                                    pedNumero,
                                    pedPrecioTotal,
                                    pedDescuento,
                                    pedIva
                                )
                                values(
                                    :pedNumero,
                                    :pedPrecioTotal,
                                    :pedDescuento,
                                    :pedIva
                                    )";
                try {
                    $stmt=$this->db->prepare($sql);
                    
                    $stmt->bindParam(':pedNumero',$pedNumero,PDO::PARAM_STR);
                    $stmt->bindParam(':pedPrecioTotal',$pedPrecioTotal,PDO::PARAM_STR);
                    $stmt->bindParam(':pedDescuento',$pedDescuento,PDO::PARAM_STR);
                    $stmt->bindParam(':pedIva',$pedIva,PDO::PARAM_STR);
                    
                    if($stmt->execute()) {
                        return $this->db->lastInsertId();
                    }else{
                        return 0;
                    }
                    
                } catch (PDOException $e) {
                    print $e->getMessage();
                }		
        }
        
        function update($id,$pedNumero,$pedPrecioTotal,$pedDescuento,$pedIva)
        {
            $sql="UPDATE pedido
                        SET
                        pedNumero = :pedNumero,
                        pedPrecioTotal = :pedPrecioTotal,
                        pedDescuento = :pedDescuento,
                        pedIva = :pedIva                        
                        WHERE id = :id";
    
            try {
                    $stmt = $this->db->prepare($sql);
                    
                    $stmt->bindParam(':pedNumero',$pedNumero,PDO::PARAM_STR);
                    $stmt->bindParam(':pedPrecioTotal',$pedPrecioTotal,PDO::PARAM_STR);
                    $stmt->bindParam(':pedDescuento',$pedDescuento,PDO::PARAM_STR);
                    $stmt->bindParam(':pedIva',$pedIva,PDO::PARAM_STR);
                    $stmt->bindParam(':id',$id,PDO::PARAM_STR);

                    if($stmt->execute()) {
                        return true;
                    }else{
                        return false;
                    }
                    
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
        }

        function delete($id)
        {
            $sql="DELETE FROM pedido
                    WHERE id = :id";
            try {
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_STR);  
                if ($stmt->execute()) {
                    return true;
                }else{
                    return false;
                }
            } catch (PDOException $e) {
                print $e->getMessage();
            }
        }

        function BuscarId($id){
            $consulta = "
            
                                    SELECT `pedido`.`id`,
                                    `pedido`.`pedNumero`,
                                    `pedido`.`pedPrecioTotal`,
                                    `pedido`.`pedDescuento`,
                                    `pedido`.`pedIva`
                                    FROM `prueba`.`pedido`
                                    where id = :id

                                ";
    
                try {
                    
                    $sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
                    $sentencia->bindParam(':id', $id, PDO::PARAM_STR);  
                    $sentencia->execute();
    
                    $objPedido = array();
                    
                    while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
                                        # code...
                        $Pedido= array();
                    
                        $Pedido['id']=$fila[0];
                        $Pedido['pedNumero']=$fila[1];
                        $Pedido['pedPrecioTotal']=$fila[2];
                        $Pedido['pedDescuento']=$fila[3];
                        $Pedido['pedIva']=$fila[4];
                                        
                        $objPedido[]=$Pedido;
                    
                    }
                    
                    return json_encode($objPedido);
                    
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
        }
    
        
        function BuscarItem($item){
            $consulta = "
            
                                    SELECT `pedido`.`id`,
                                    `pedido`.`pedNumero`,
                                    `pedido`.`pedPrecioTotal`,
                                    `pedido`.`pedDescuento`,
                                    `pedido`.`pedIva`
                                    FROM `prueba`.`pedido`
                                    where pedNumero like '%".$item."%';

                                ";
    
                try {
                    
                    $sentencia = $this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
                    $sentencia->bindParam(':id', $id, PDO::PARAM_STR);  
                    $sentencia->execute();
    
                    $objPedido = array();
                    
                    while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
                                        # code...
                        $Pedido= array();
                    
                        $Pedido['id']=$fila[0];
                        $Pedido['pedNumero']=$fila[1];
                        $Pedido['pedPrecioTotal']=$fila[2];
                        $Pedido['pedDescuento']=$fila[3];
                        $Pedido['pedIva']=$fila[4];
                                        
                        $objPedido[]=$Pedido;
                    
                    }
                    
                    return json_encode($objPedido);
                    
                } catch (PDOException $e) {
                    print $e->getMessage();
                }
        }
    
    }
?>