<?php  
include("../Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
date_default_timezone_set('America/Tegucigalpa');
session_start();

$identificador= $_POST['txtIdentificador'];
$nombre=$_POST['txtNombre'];
$apellido=$_POST['txtApellido'];
$cedula=$_POST['txtCedula'];
$telefono=$_POST['txtTelefono'];
$departamento=$_POST['slcDepartamento'];
$municipio=$_POST['slcMunicipio'];
$correo=$_POST['txtCorreo'];



//echo $nombre.$descripcion.$precio.$cantidad.$identificador.$estado.$color.$categoria.$res['PrecioActual'] ;

$consultaB = sprintf("UPDATE tbl_usuarios SET nombre='%s', apellido='%s', correo='%s', cedula='%s', telefono='%s', DepartamentoID='%s', MunicipioID='%s' WHERE usuarioID='%s'",
	$conexion->antiInyeccion($nombre),
	$conexion->antiInyeccion($apellido),
	$conexion->antiInyeccion($correo),
	$conexion->antiInyeccion($cedula),
	$conexion->antiInyeccion($telefono),
	$conexion->antiInyeccion($departamento),
	$conexion->antiInyeccion($municipio),
	$conexion->antiInyeccion($identificador));
$resultado=$conexion->ejecutarconsulta($consultaB);

$fecha=date("Y-m-d");
$hora=date("G:i:s");

$sql="SELECT Correo FROM tbl_usuario Where IDUsuario=".$_SESSION['ID'];
$resul=$conexion->ejecutarconsulta($sql);
$correoAdmin=$conexion->obtenerfila($resul);

$consultaC = sprintf("INSERT INTO tbl_log(evento, descripcion, fecha, hora,direccion_ip_usuario ,usuarioid) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Modificacion de datos de docente"),$conexion->antiInyeccion("El usuario con correo:"." ".$correoAdmin['Correo']." "."ha modificado los datos del docente con nombre"." ".$nombre),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora), $conexion->antiInyeccion($conexion->ip()),$conexion->antiInyeccion($_SESSION['ID']));

$conexion->ejecutarconsulta($consultaC);


$var = "Datos modificados con exito";		
			echo "<script>
					alert('".$var."');
					window.location='../Docentes.php'; 
				  </script>";

mysqli_close($conexion->getLink());
?>