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

$consulta="SELECT count(*) from tbl_calificaciones where asignaturaID=".$asignaturaID." and estudianteID=".$estudianteID;
$resultado=$conexion->ejecutarconsulta($consulta);


if ($resultado->fetch_assoc()['count(*)']==0) {
	# code...
$consulta="INSERT INTO tbl_calificaciones(asignaturaID,estudianteID) values(".$asignaturaID.",".$estudianteID.")";
$conexion->ejecutarconsulta($consulta);
}
if ($parcial==1) {
	$consulta="UPDATE tbl_calificaciones SET Nota1=".$calificacion." WHERE estudianteID=".$estudianteID." and asignaturaID=".$asignaturaID;
	$conexion->ejecutarconsulta($consulta);
}elseif ($parcial==2) {
	# code...
	$consulta="UPDATE tbl_calificaciones SET Nota2=".$calificacion." WHERE estudianteID=".$estudianteID." and asignaturaID=".$asignaturaID;
	$conexion->ejecutarconsulta($consulta);
}elseif ($parcial==3) {
	# code...
	$consulta="UPDATE tbl_calificaciones SET Nota3=".$calificacion." WHERE estudianteID=".$estudianteID." and asignaturaID=".$asignaturaID;
	$conexion->ejecutarconsulta($consulta);
}elseif ($parcial==4) {
	# code...
	$consulta="UPDATE tbl_calificaciones SET Nota4=".$calificacion." WHERE estudianteID=".$estudianteID." and asignaturaID=".$asignaturaID;
	$conexion->ejecutarconsulta($consulta);
}

echo '<script>
		alert("Calificacion registrada con exito");
		window.location="../Calificaciones.php";
		</script>';


?>