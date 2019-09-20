<?php 
session_start();
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
$descripcion = $_POST['descripcion'];
$nivel=$_POST['slcNivel'];

$consulta="INSERT into tbl_anuncios(descripcion, nivelID) values('".$descripcion."',".$nivel.")";
$conexion->ejecutarconsulta($consulta);

header("Location: ../index.php");
?>