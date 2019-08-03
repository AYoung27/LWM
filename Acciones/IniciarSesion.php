<?php
	#	Clases de Base de datos y de horarios para inserciones
	date_default_timezone_set('America/Tegucigalpa');
 	include("../Clases/Conexion.php");

 	#	Creacion de la conexion a la Base de Datos
 	$conexion = new Conexion();
 	$conexion->mysql_set_charset("utf8");

 	#	Datos de fecha para la insercion en la tabla de logs
	$fecha = date("Y-m-d");
					
 	#	Carga de los elementos recibidios por el HTML via POST
 	$correo = $_POST["txtCorreo"];
 	$password = sha1($_POST["txtPassword"]);

 	#	Consulta de busqueda de correo
 	$consulta= sprintf("SELECT count(*) FROM tbl_usuarios where correo='%s'", $conexion->antiInyeccion($correo));
 	$resultado=$conexion->ejecutarconsulta($consulta);

 	# 	Caso verdadero, continuar. Caso falso, redirigir a pagina de registro indicando que el correo esta disponible para su uso en la plataforma
 	if ($resultado->fetch_assoc()['count(*)'] == '1') {

 		#	Consulta de verificacion de sesion
 		$consulta=sprintf("SELECT Estado FROM tbl_sesion where usuarioid=(SELECT usuarioid FROM tbl_usuarios where correo='%s')",$conexion->antiInyeccion($correo));
 		$aux=$conexion->ejecutarconsulta($consulta);

 		#	Caso verdadero, continuar. Caso falso, no permitir el inicio de sesion
 		if ($aux->fetch_assoc()['Estado']== '0') {

 			#	Consulta de comparacion de contraseña
 			$cons= sprintf("SELECT password FROM tbl_usuarios where correo='%s'", $conexion->antiInyeccion($correo));

 			#	Caso verdadero, continuar. Caso falso, mostrar mensaje de contraseña incorrecta
	 		if ($password==$conexion->ejecutarconsulta($cons)->fetch_assoc()['password']) {
					
					#	Inicializar la variable $_SESSION
					session_start();

					#	Consulta de obtencion de datos para almacenar en la variable $_SESSION
					$consulta=sprintf("SELECT usuarioid, nombre, apellido, correo, tipousuarioid FROM tbl_usuarios WHERE correo = '%s'",$conexion->antiInyeccion($correo));

					#	Almacenamiento de datos
					$_SESSION['ID'] = $conexion->ejecutarconsulta($consulta)->fetch_assoc()['usuarioid'];
					$_SESSION['TipoUsuario'] = $conexion->ejecutarconsulta($consulta)->fetch_assoc()['tipousuarioid'];
					$_SESSION['Usuario']=$conexion->ejecutarconsulta($consulta)->fetch_assoc()['nombre']." ".$conexion->ejecutarconsulta($consulta)->fetch_assoc()['apellido'];
					$_SESSION['Correo']=$conexion->ejecutarconsulta($consulta)->fetch_assoc()['correo'];
					$_SESSION['Nombre']=$conexion->ejecutarconsulta($consulta)->fetch_assoc()['nombre'];
					$_SESSION['Apellido']=$conexion->ejecutarconsulta($consulta)->fetch_assoc()['apellido'];

					#	Verificacion del tipo de usuario 
					if ($_SESSION['TipoUsuario'] == '2') {
						
						#	Consulta para obtener el IDProveedor
						$consultaDocente = sprintf("SELECT docenteID FROM tbl_docentes WHERE usuarioID = '%s'", $conexion->antiInyeccion($_SESSION['ID']));

						#	Almacenamiento en la variable $_SESSION
						$_SESSION['Docente'] = $conexion->ejecutarconsulta($consultaDocente)->fetch_assoc()['docenteID'];
					}elseif ($_SESSION['TipoUsuario']== '3') {
						$consultaEstudiante = sprintf("SELECT estudianteID FROM tbl_estudiantes WHERE usuarioID = '%s'", $conexion->antiInyeccion($_SESSION['ID']));
						$_SESSION['Estudiante']=$conexion->ejecutarconsulta($consultaEstudiante)->fetch_assoc()['estudianteID'];
					}

					#	Establecer el nuevo estado del usuario como conectado
					$sql = sprintf("UPDATE tbl_sesion SET Estado = '1' WHERE usuarioid = '%s'",$conexion->antiInyeccion($_SESSION['ID']));
					$conexion->ejecutarconsulta($sql);

					#	Insertar en la tabla de logs el inicio de sesion exitoso
					$hora = date("G:i:s");
					$consultaB = sprintf("INSERT INTO tbl_log(evento, descripcion, fecha, hora,direccion_ip_usuario ,usuarioid) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Inicio de sesion"),$conexion->antiInyeccion("El usuario con correo:"." ".$correo." "."ha iniciado sesion"),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora), $conexion->antiInyeccion($conexion->ip()),$conexion->antiInyeccion($_SESSION['ID']));
					$conexion->ejecutarconsulta($consultaB);
					
					
					mysqli_close($conexion->getLink());
					header('Location: ../index.php');
					
				} else {
					mysqli_close($conexion->getLink());
					$var = "password erroneo";		
					echo "<script>
							alert('".$var."'); 
  							window.location='../Login.php';
				  		</script>";
				}	
 		}else {
			$var = "Inicio de Sesion no Autorizado";		
			echo "<script>
					alert('".$var."'); 
  					window.location='../Login.php';
				  </script>";
		}
 	} else {
 		$var = "El usuario no existe";		
			echo "<script>
					alert('".$var."'); 
				  </script>";
 	}

?>