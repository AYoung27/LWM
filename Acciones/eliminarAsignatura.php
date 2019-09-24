<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: index.php');
}


$asignaturaID=$_GET['asignaturaID'];
   $consulta="DELETE FROM tbl_asignaturas where AsignaturaID=".$asignaturaID;
   $conexion->ejecutarconsulta($consulta);

   $consulta="DELETE FROM tbl_asignaturasxdocente where AsignaturaID=".$asignaturaID;
   $conexion->ejecutarconsulta($consulta);


   header("Location: ../Asignaturas.php");
?>