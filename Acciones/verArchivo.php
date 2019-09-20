<?php 
session_start();
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: Login.php');
}


$archivo=$_GET['recursoID'];
$consulta="SELECT nombreArchivo,tipo from tbl_recursosEstudiantiles where recursoID=".$archivo;
$resultado = $conexion->ejecutarconsulta($consulta);


$arreglo= $resultado->fetch_array();
header('Content-disposition: inline');
header('Content-type:'.$arreglo['tipo']); //not sure if this is the correct MIME type
readfile('Archivos/'.$arreglo['nombreArchivo']);

?>