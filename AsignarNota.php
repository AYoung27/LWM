<?php

$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$estudianteID=$_GET['estudianteID'];
$asignaturaID=$_GET['asignaturaID'];
$nombreClase=$_GET['nombreClase'];

  ?>

<?php 
session_start();
include("Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: Login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Learn With Me</title>
	<script type="text/javascript" src="Estilos/js/jquery.min.js"></script>
	<script type="text/javascript" src="Estilos/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="Estilos/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Estilos/fonts/awesome/css/all.css">
	<link rel="icon" href="img/favicon3.png" >
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand pl-3" href="Principal.php"><img src="img/learn 1.png" height="40"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			</ul>
			<ul class="navbar-nav mr-2 my-lg-0">
				<li class="nav-item">
					<a class="nav-link active p-0" href="Acciones/CerrarSesion.php">Salir</a>
				</li>
			</ul>
		</div>
	</nav>	
	<div class="container mt-5">
		<?php
		if($_SESSION['TipoUsuario']=='2'){
			$consulta="SELECT tbl_asignaturas.AsignaturaID, nombreAsignatura from tbl_asignaturas, tbl_asignaturasxdocente,tbl_docentes, tbl_cursos where tbl_asignaturas.asignaturaID=tbl_asignaturasxdocente.asignaturaID and tbl_docentes.DocenteID=tbl_asignaturasxdocente.docenteID and tbl_asignaturas.CursoID=tbl_cursos.CursoID and tbl_docentes.DocenteID=".$_SESSION['Docente'];
			$resultado=$conexion->ejecutarconsulta($consulta);

			echo '
				<div class="col-md-12 mb-5" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<h4 style="text-align: center;" class="mb-5">
					Calificaciones
				</h4>
				<form action="calificar.php" method="POST">
					<div class="container">
						<div class="row">
							<div class="col-md-4"> 
								<label>Seleccione la asignatura: 
								<select class="custom-select" name="slcAsignaturas">
									<option selected>Elija una asignatura</option>';
									while($arreglo=$resultado->fetch_array()){
										echo '<option value='.$arreglo['AsignaturaID'].'>'.$arreglo['nombreAsignatura'].'</option>';
									}
								echo '</select>
							</div>
							<div class="col-md-4 mt-4">
								<button class="btn btn-primary ml-5" onclick="cargarDiv(div)">Seleccionar Asignatura</button>
							</div>
						</div>
						<div class="row">
							<div id="Alumnos"></div>
						</div>
					</div>
				</form>

			</div>';

			$array=array(1=>"Primer Parcial",
					2=>"Segundo Parcial",
					3=>"Tercer Parcial",
					4=>"Cuarto Parcial");

			echo '<div>
				<form action="Acciones/subirNota.php" method="POST">
					<div class="container mb-5">
						<div class="row mb-5">
							<div class="col-md-4">
							<label>Identificador del estudiante:</label>
							<input type="number" name="txtEstudianteID" value="'.$estudianteID.'" class="form-control" readonly>
							</div>
							<div class="col-md-4">
							<label>nombre del estudiante:</label>
							<input type="text" name="txtNombre" disabled value="'.$nombre.' '.$apellido.'" class="form-control">
							</div>
							<div class="col-md-4">
							<label>Nombre de la Asignatura</label>
							<input type="text" name="txtAsignatura" disabled value="'.$nombreClase.'" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
							<label>Ingresa la calificacion del alumno</label>
							<input type="number" name="txtNota" step="any" class="form-control" required min="0" max="100">
							</div>
							<div class="col-md-4">
							<label>Selecciona un parcial:</label>
							<select class="custom-select" name="slcParcial">
								<option selected>Elige un parcial</option>';
							for ($i=1; $i <=4 ; $i++) { 
								# code...
								echo '<option value="'.$i.'">'.$array[$i].'</option>';
							}		
							echo '</select>
							</div>
						</div>
						<div class="row"><input type="number" name="txtAsignaturaID" value="'.$asignaturaID.'" hidden></div>
						<div class="row mt-3 ml-1" ><button type="submit" class="btn btn-primary">Asignar nota</button></div>
					</div>		

				<form>
			</div>
			</div>';


		}elseif ($_SESSION['TipoUsuario']=='3') {
		}
			?>
	</div>

	<!-- Modal -->
<!-- The Modal -->
		<footer class="py-5 bg-dark" style=" position: absolute; width: 100%;">
				<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</footer>

	</body>
	</html>