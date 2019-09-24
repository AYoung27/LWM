<?php 
session_start();
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: Login.php');
}

$planID=$_GET["PlanID"];
$consulta="UPDATE tbl_instituciones SET planID=".$planID." WHERE institucionID=".$_SESSION['Institucion'];
$conexion->ejecutarconsulta($consulta);

header("Location: ../Principal.php");
?>