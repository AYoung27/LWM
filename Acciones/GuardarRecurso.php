<?php 
session_start();
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: Login.php');
}

$archivo = $_FILES["archivo"]["tmp_name"];
 $tamanio = $_FILES["archivo"]["size"];
 $tipo    = $_FILES["archivo"]["type"];
 $nombre  = $_FILES["archivo"]["name"];
 $destino = "../Archivos/".$nombre;
 if ($nombre!="") {
 	# code...
 	if (copy($archivo,$destino)) {
 		# code...
 		 $descripcion  = $_POST["txtDescripcion"];
 		$identificador =$_POST["txtIdentificador"];
 		$titulo=$_POST["txtTitulo"];

 		 $consulta = sprintf("INSERT INTO tbl_recursosEstudiantiles(titulo,descripcion,tipo,tamaño,nombreArchivo,asignaturaID) VALUES ('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion($titulo),$conexion->antiInyeccion($descripcion),$conexion->antiInyeccion($tipo),$conexion->antiInyeccion($tamanio),$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($identificador));
    	$conexion->ejecutarconsulta($consulta);

 	}
 }

 
   
 
 mysqli_close($conexion->getLink());

 header('Location: ../RecursosEstudiantiles.php');

?>