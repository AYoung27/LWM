<?php 
	date_default_timezone_set('America/Tegucigalpa');
	include("../Clases/Conexion.php");
	$conexion = new Conexion();
	$conexion->mysql_set_charset("utf8");
	session_start();
	include("../Clases/Usuario.php");

	$nombre= ucwords(strtolower($_POST["txtNombre"]));

	$curso=$_POST["slcCursos"];
	$docente=$_POST["slcDocentes"];



			$consulta=sprintf("INSERT INTO tbl_Asignaturas(nombreAsignatura,CursoID) VALUES ('%s','%s')",$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($curso));
			$conexion->ejecutarconsulta($consulta);

			$consulta="SELECT asignaturaID from tbl_asignaturas WHERE cursoID=".$curso." and nombreAsignatura="."'".$nombre."'";
			$resultado=$conexion->ejecutarconsulta($consulta);

			$asignaturaID=$resultado->fetch_assoc()['asignaturaID'];

			$consulta=sprintf("INSERT INTO tbl_asignaturasxdocente(AsignaturaID, DocenteID) VALUES('%s','%s')",$conexion->antiInyeccion($asignaturaID),$conexion->antiInyeccion($docente));
			$conexion->ejecutarconsulta($consulta);
			

			$fecha=date("Y-m-d");
			$hora=date("G:i:s");
			$consultaB = sprintf("INSERT INTO tbl_log(Evento, Descripcion, Fecha, Hora,Direccion_IP_Usuario,usuarioID) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Nuevo registro"),$conexion->antiInyeccion("Se ha registrado una nueva asignatura con nombre:"." ".$nombre),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora),$conexion->antiInyeccion($conexion->ip()) ,$conexion->antiInyeccion($_SESSION['ID']));
			$conexion->ejecutarconsulta($consultaB);

			$var = "Asignatura agregada con exito";		
			echo "<script>
					alert('".$var."');
					 window.location='../Asignaturas.php';
				  </script>";
			
			mysqli_close($conexion->getLink());


 ?>