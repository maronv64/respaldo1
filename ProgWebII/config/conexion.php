<?php
/*
 *conexion de la base datos en php usando pdo
 */
$dsn='mysql:dbname=septimosemestre;host=localhost;charset=utf8';
$dbuser='root';
$dbuserpw='';
try {
$conn=new PDO($dsn,$dbuser,$dbuserpw);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (Exception $e) {
	echo "Error! Se ha producido el siguiente error".$e->getMessage() ;
}
?>