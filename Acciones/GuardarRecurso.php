	<?php 
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'Exception.php';
	require 'PHPMailer.php';
	require 'SMTP.php';

	include("../Clases/Conexion.php");
	$conexion = new Conexion();
	$conexion->mysql_set_charset("utf8");
	if (empty($_SESSION)) {
		header('Location: Login.php');
	}

	$mail = new PHPMailer(true);




	$archivo = $_FILES["archivo"]["tmp_name"];
	$tamanio = $_FILES["archivo"]["size"];
	$tipo    = $_FILES["archivo"]["type"];
	$nombre  = $_FILES["archivo"]["name"];
	$destino = "../Archivos/".$nombre;
	if ($nombre!="") {
	 	# code...
		if (copy($archivo,$destino)) {
	 		# code...
			$descripcion  = $_POST["txtDescripcion"];
			$identificador =$_POST["txtIdentificador"];
			$titulo=$_POST["txtTitulo"];

			$consulta = sprintf("INSERT INTO tbl_recursosEstudiantiles(titulo,descripcion,tipo,tamaño,nombreArchivo,asignaturaID,institucionID) VALUES ('%s','%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion($titulo),$conexion->antiInyeccion($descripcion),$conexion->antiInyeccion($tipo),$conexion->antiInyeccion($tamanio),$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($identificador),$conexion->antiInyeccion($_SESSION['Institucion']));
			$conexion->ejecutarconsulta($consulta);

			
			$consulta = "SELECT correo FROM tbl_usuarios, tbl_estudiantes,tbl_estudiantesxcurso,tbl_cursos, tbl_asignaturas,tbl_instituciones WHERE tbl_usuarios.usuarioID = tbl_estudiantes.usuarioID AND tbl_estudiantesxcurso.estudianteID = tbl_estudiantes.EstudianteID AND tbl_estudiantesxcurso.CursoID = tbl_cursos.CursoID AND tbl_cursos.CursoID=tbl_asignaturas.CursoID AND tbl_asignaturas.institucionID=tbl_instituciones.institucionID and tbl_estudiantes.institucionID=tbl_instituciones.institucionID and tbl_cursos.institucionID=tbl_instituciones.institucionID and tbl_estudiantes.institucionID=".$_SESSION['Institucion']." and tbl_asignaturas.asignaturaID=".$identificador;
			$resultado=$conexion->ejecutarconsulta($consulta);

			while ($arreglo=$resultado->fetch_array()) {
				# code...
			try {
	    //Server settings
	    		$mail->SMTPDebug = 0;                                       // Enable verbose debug output
	    		$mail->isSMTP();                                            // Set mailer to use SMTP
	    		$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    		$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	    		$mail->Username   = 'youngadan27@gmail.com';                     // SMTP username
	    		$mail->Password   = 'ajmy1994';                               // SMTP password
	    		$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
	    		$mail->Port       = 587;                                    // TCP port to connect to

	    //Recipients
	    		$mail->setFrom('youngadan27@gmail.com', 'Docente');
	    		$mail->addAddress($arreglo['correo']);     // Add a recipient

	    // Attachments
	    // Content
	    		$mail->isHTML(true);                                  // Set email format to HTML
	    		$mail->Subject = 'Recursos Estudiantiles';
	    		$mail->Body    = 'Se ha agregado un nuevo archivo en la plataforma Learn With Me ';

	    		$mail->send();
	    	
			} catch (Exception $e) {
				echo "<script>
				alert('Mensaje no enviado "."{$mail->ErrorInfo}'); 
				</script>";
			}

		}
		}
	}




mysqli_close($conexion->getLink());

header('Location: ../RecursosEstudiantiles.php');

?>