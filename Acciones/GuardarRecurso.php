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

			$consulta = sprintf("INSERT INTO tbl_recursosEstudiantiles(titulo,descripcion,tipo,tamaño,nombreArchivo,asignaturaID) VALUES ('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion($titulo),$conexion->antiInyeccion($descripcion),$conexion->antiInyeccion($tipo),$conexion->antiInyeccion($tamanio),$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($identificador));
			$conexion->ejecutarconsulta($consulta);

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
	    		$mail->addAddress('youngadan27@gmail.com');     // Add a recipient

	    // Attachments
	    // Content
	    		$mail->isHTML(true);                                  // Set email format to HTML
	    		$mail->Subject = 'este es el asunto';
	    		$mail->Body    = 'Este es el mensaje ';

	    		$mail->send();
	    		echo "<script>
	    		alert('Se ha notificado a los estudiantes'); 
	    		</script>";
			} catch (Exception $e) {
				echo "<script>
				alert('Mensaje no enviado "."{$mail->ErrorInfo}'); 
				</script>";
			}

		}
	}




mysqli_close($conexion->getLink());

header('Location: ../RecursosEstudiantiles.php');

?>