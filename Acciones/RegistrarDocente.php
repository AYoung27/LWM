<?php 
	date_default_timezone_set('America/Tegucigalpa');
	include("../Clases/Conexion.php");
	$conexion = new Conexion();
	$conexion->mysql_set_charset("utf8");
	include("../Clases/Usuario.php");
	session_start();

	$nombre= ucwords(strtolower($_POST["txtNombre"]));
	$apellido=ucwords(strtolower($_POST["txtApellido"]));
	$correo=$_POST["txtCorreo"];
	$password=sha1($_POST["txtPassword"]);
	$cedula=$_POST["txtCedula"];
	$telefono=$_POST["txtTelefono"];
	$fechaNac=$_POST["txtFecha"];
	$departamento=$_POST["slcDepartamento"];
	$municipio=$_POST["slcMunicipio"];
	

	$consulta = sprintf("SELECT count(*) FROM tbl_usuarios WHERE Correo = '%s'",$conexion->antiInyeccion($correo));
		$resultado = $conexion->ejecutarconsulta($consulta);

		//	Verificar que no se haya registrado el correo, insertar si no hay coincidencias
		if ($resultado->fetch_assoc()['count(*)'] == '0') {		
			//	Realizar insercion

			$consulta=sprintf("INSERT INTO tbl_usuarios(nombre, apellido, correo, password, Cedula, FechaNacimiento, telefono, tipoUsuarioID, DepartamentoID, MunicipioID) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion($nombre),$conexion->antiInyeccion($apellido),$conexion->antiInyeccion($correo),$conexion->antiInyeccion($password),$conexion->antiInyeccion($cedula),$conexion->antiInyeccion($fechaNac),$conexion->antiInyeccion($telefono),$conexion->antiInyeccion('2'),$conexion->antiInyeccion($departamento),$conexion->antiInyeccion($municipio));
			$conexion->ejecutarconsulta($consulta);

			$consulta=sprintf("SELECT usuarioID FROM tbl_usuarios where correo= '%s' ",$conexion->antiInyeccion($correo));
			$resultado=$conexion->ejecutarconsulta($consulta);
			$usuarioid=$resultado->fetch_array();

			$consulta=sprintf("INSERT into tbl_docentes(usuarioID,institucionID) values('%s',%s)",$conexion->antiInyeccion($usuarioid['usuarioID']),$conexion->antiInyeccion($_SESSION['Institucion']));
			$conexion->ejecutarconsulta($consulta);

			$consulta =sprintf("INSERT INTO tbl_sesion(usuarioID, estado) values('%s','%s')", $conexion->antiInyeccion($usuarioid['usuarioID']), $conexion->antiInyeccion("0"));
			$conexion->ejecutarconsulta($consulta);

			$fecha=date("Y-m-d");
			$hora=date("G:i:s");
			$consultaB = sprintf("INSERT INTO tbl_log(Evento, Descripcion, Fecha, Hora,Direccion_IP_Usuario,usuarioID) values('%s','%s','%s','%s','%s','%s')",$conexion->antiInyeccion("Nuevo registro"),$conexion->antiInyeccion("Se ha registrado un nuevo docente con correo:"." ".$correo),$conexion->antiInyeccion($fecha),$conexion->antiInyeccion($hora),$conexion->antiInyeccion($conexion->ip()) ,$conexion->antiInyeccion($usuarioid['usuarioID']));
			$conexion->ejecutarconsulta($consultaB);

			$var = "Docente agregado con exito";		
			echo "<script>
					alert('".$var."');
					window.location='../Docentes.php';
				  </script>";
			
			mysqli_close($conexion->getLink());
		//	En caso de encontrarse un error, se retornara a la pagina de registro
		} else {
			mysqli_close($conexion->getLink());
			$var = "Este correo ya fue registrado previamente";		
			echo "<script>
					alert('".$var."'); 
  					window.location='../Docentes.php';
				  </script>";
		}


 ?>