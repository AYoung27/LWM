<?php 
	date_default_timezone_set('America/Tegucigalpa');
	include("../Clases/Conexion.php");
	$conexion = new Conexion();
	$conexion->mysql_set_charset("utf8");
	include("../Clases/Usuario.php");

	$nombreInstituto= ucwords(strtolower($_POST["txtNombreINS"]));
	$nombre=ucwords(strtolower($_POST["txtNombreDIRECTOR"]));
	$apellido=ucwords(strtolower($_POST["txtApellidoDIRECTOR"]));
	$telefono=$_POST["txtTelefono"];
	$correo=$_POST["txtCorreo"];
	$password=sha1($_POST["txtPassword"]);
	$departamento=$_POST["slcDepartamento"];
	$municipio=$_POST["slcMunicipio"];
	$cedula=$_POST["txtCedula"];
	$fechaN=$_POST["txtFecha"];
	
	$consulta = sprintf("SELECT count(*) FROM tbl_usuarios WHERE Correo = '%s'",$conexion->antiInyeccion($correo));
		$resultado = $conexion->ejecutarconsulta($consulta);

		//	Verificar que no se haya registrado el correo, insertar si no hay coincidencias
		if ($resultado->fetch_assoc()['count(*)'] == '0') {		
			//	Realizar insercion

			$consulta=sprintf("INSERT INTO tbl_usuarios(nombre,apellido,correo,password,Cedula,FechaNacimiento,telefono,tipoUsuarioID,DepartamentoID,MunicipioID) values('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($apellido),$conexion->antiInyeccion($correo),$conexion->antiInyeccion($password),$conexion->antiInyeccion($cedula),$conexion->antiInyeccion($fechaN),$conexion->antiInyeccion($telefono),$conexion->antiInyeccion("1"),$conexion->antiInyeccion($departamento),$conexion->antiInyeccion($municipio));
			$conexion->ejecutarconsulta($consulta);
			//	Crear sesion
			session_start();
			$consulta = sprintf("SELECT UsuarioID, TipoUsuarioID FROM tbl_usuarios WHERE Correo = '%s'",$conexion->antiInyeccion($correo));
			$_SESSION['ID'] = $conexion->ejecutarconsulta($consulta)->fetch_assoc()['UsuarioID'];
			$_SESSION['TipoUsuario'] = $conexion->ejecutarconsulta($consulta)->fetch_assoc()['TipoUsuarioID'];
			$_SESSION['Usuario'] = $nombre." ".$apellido;
			$_SESSION['Nombre'] = $nombre;
			$_SESSION['Apellido'] = $apellido;
			$_SESSION['Correo'] = $correo;

			$consulta=sprintf("INSERT INTO tbl_instituciones(nombreInstitucion,planID ,usuarioID) values('%s','%s','%s')",$conexion->antiInyeccion($nombreInstituto),$conexion->antiInyeccion("1"),$conexion->antiInyeccion($_SESSION['ID']));
			$conexion->ejecutarconsulta($consulta);
			
			// Redirigir
			$consulta="SELECT intitucionID from tbl_instituciones where usuarioID=".$_SESSION['ID'];
			$resultado=$conexion->ejecutarconsulta($consulta);
			$_SESSION['Institucion'] = $resultado->fetch_assoc()['institucionID'];
			

			//
			$consulta =sprintf("INSERT INTO tbl_sesion(usuarioID, estado) values('%s','%s')", $conexion->antiInyeccion($_SESSION['ID']), $conexion->antiInyeccion("1"));
			$conexion->ejecutarconsulta($consulta);

			$fecha=date("Y-m-d");
			$hora=date("G:i:s");
			$consultaB = sprintf("INSERT INTO tbl_log(evento, descripcion, fecha, hora,direccion_ip_usuario,usuarioid) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Nuevo registro"),$conexion->antiInyeccion("Se ha registrado un nuevo usuario con la direccion de correo:"." ".$correo),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora),$conexion->antiInyeccion($conexion->ip()) ,$conexion->antiInyeccion($_SESSION['ID']));
			$conexion->ejecutarconsulta($consultaB);
			header('Location: ../PlanesPago.php');
			mysqli_close($conexion->getLink());
		//	En caso de encontrarse un error, se retornara a la pagina de registro
		} else {
			mysqli_close($conexion->getLink());
			$var = "Este correo ya fue registrado previamente";		
			echo "<script>
					alert('".$var."'); 
  					window.location='../registro.php';
				  </script>";
		}


 ?>