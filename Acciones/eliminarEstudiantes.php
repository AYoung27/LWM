<?php  
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
date_default_timezone_set('America/Tegucigalpa');
session_start();
$consulta ="SELECT EstudianteID FROM tbl_estudiantes where usuarioid=".$_GET['usuarioID'];
$resultado = $conexion->ejecutarconsulta($consulta);
$estudianteid=$resultado->fetch_array()['EstudianteID'];

$consulta = "DELETE FROM tbl_estudiantesxcurso  WHERE EstudianteID =".$estudianteid;
$conexion->ejecutarconsulta($consulta);

$consulta = "DELETE FROM tbl_estudiantes  WHERE EstudianteID =".$estudianteid;
$conexion->ejecutarconsulta($consulta);

$consulta = "DELETE FROM tbl_usuarios  WHERE usuarioID =".$_GET['usuarioID'];
$conexion->ejecutarconsulta($consulta);


$fecha=date("Y-m-d");
$hora=date("G:i:s");

$sql="SELECT Correo FROM tbl_usuarios Where IDUsuario=".$_SESSION['ID'];
$resul=$conexion->ejecutarconsulta($sql);
$correo=$conexion->obtenerfila($resul);

$consultaC = sprintf("INSERT INTO tbl_log(evento, descripcion, fecha, hora,direccion_ip_usuario ,usuarioid) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Eliminar producto"),$conexion->antiInyeccion("El usuario con correo:"." ".$correo['Correo']." "."ha eliminado un producto "),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora), $conexion->antiInyeccion($conexion->ip()),$conexion->antiInyeccion($_SESSION['ID']));

$conexion->ejecutarconsulta($consultaC);
echo '<script>alert("Estudiante Eliminado");</script>';
header("Location: ../Estudiantes.php");
?>