<?php 
session_start();
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: Login.php');
}

$estudianteID=$_POST['txtEstudianteID'];
$calificacion=$_POST['txtNota'];
$asignaturaID=$_POST['txtAsignaturaID'];
$parcial=$_POST['slcParcial'];

echo $estudianteID.' '.$calificacion.' '.$asignaturaID.' '.$parcial;

$consulta="INSERT into tbl_calificaciones(calificacion,parcialID,asignaturaID,estudianteID) values(".$calificacion.",".$parcial.",".$asignaturaID.",".$estudianteID.")";
$conexion->ejecutarconsulta($consulta);
echo '<script>alert("Calificacion registrada con exito");</script>';

//header("Location: ../calificaciones.php");
?>