<?php 
	date_default_timezone_set('America/Tegucigalpa');
	include("../Clases/Conexion.php");
	$conexion = new Conexion();
	$conexion->mysql_set_charset("utf8");
	session_start();
	include("../Clases/Usuario.php");

	$nombre= ucwords(strtolower($_POST["txtNombre"]));

	$secciones=$_POST["txtSecciones"];

	$consulta = sprintf("SELECT count(*) FROM tbl_cursos WHERE institucionID='%s' and nombreCurso = '%s'",$conexion->antiInyeccion($_SESSION['Institucion']),$conexion->antiInyeccion($nombre));
		$resultado = $conexion->ejecutarconsulta($consulta);

		//	Verificar que no se haya registrado el curso, insertar si no hay coincidencias
		if ($resultado->fetch_assoc()['count(*)'] == '0') {		
			//	Realizar insercion

			$consulta=sprintf("INSERT INTO tbl_Cursos(nombreCurso, institucionID) VALUES ('%s', '%s')",$conexion->antiInyeccion($nombre), $conexion->antiInyeccion($_SESSION['Institucion']));
			$conexion->ejecutarconsulta($consulta);

			$consulta=sprintf("SELECT cursoID FROM tbl_Cursos where institucionID='%s' and nombreCurso='%s'",$conexion->antiInyeccion($_SESSION['Institucion']),$conexion->antiInyeccion($nombre));
			$resultado=$conexion->ejecutarconsulta($consulta);
			$aux=$resultado->fetch_assoc()['cursoID'];

			for ($i=1; $i <= $secciones ; $i++) { 
				# code...
				$consulta="INSERT INTO tbl_seccionesxcurso(cursoID, seccionID) values('".$aux."','".$i."')";
				$conexion->ejecutarconsulta($consulta);
			}

			

			$fecha=date("Y-m-d");
			$hora=date("G:i:s");
			$consultaB = sprintf("INSERT INTO tbl_log(Evento, Descripcion, Fecha, Hora,Direccion_IP_Usuario,usuarioID) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Nuevo registro"),$conexion->antiInyeccion("Se ha registrado un nuevo curso con nombre:"." ".$nombre),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora),$conexion->antiInyeccion($conexion->ip()) ,$conexion->antiInyeccion($_SESSION['ID']));
			$conexion->ejecutarconsulta($consultaB);

			$var = "Curso agregado con exito";		
			echo "<script>
					alert('".$var."');
					 window.location='../Cursos.php';
				  </script>";
			
			mysqli_close($conexion->getLink());
		//	En caso de encontrarse un error, se retornara a la pagina de registro
		} else {
			mysqli_close($conexion->getLink());
			$var = "Este Curso ya fue registrado previamente";		
			echo "<script>
					alert('".$var."'); 
  					window.location='../Cursos.php';
				  </script>";
		}


 ?>