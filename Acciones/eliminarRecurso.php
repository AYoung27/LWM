<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
if (empty($_SESSION)) {
	header('Location: index.php');
}

$recursoID=$_GET['recursoID'];
$consulta="DELETE FROM tbl_recursosestudiantiles where recursoID=".$recursoID;
$conexion->ejecutarconsulta($consulta);

header("Location: ../RecursosEstudiantiles.php");

?>