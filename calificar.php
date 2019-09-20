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
		<a class="navbar-brand pl-3" href="index.php"><img src="img/learn 1.png" height="40"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
			</ul>
			<ul class="navbar-nav mr-2 my-lg-0">
				<li class="nav-item">
					<a href="#"><span class="text-white pr-3"><i class="fas fa-bell"></i></span></a>
				</li>
				<li class="nav-item">
					<a href="#"><span class="text-white pr-3"><i class="fas fa-user"></i></span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link active p-0" href="Acciones/CerrarSesion.php">Salir</a>
				</li>
			</ul>
		</div>
	</nav>	
	<div class="container mt-5">
		<?php
		if($_SESSION['TipoUsuario']=='2'){
			$consulta="SELECT tbl_asignaturas.AsignaturaID, nombreAsignatura , nombreCurso,nombreSeccion from tbl_asignaturas, tbl_asignaturasxdocente,tbl_docentes, tbl_cursos, tbl_secciones,tbl_seccionesxcurso where tbl_asignaturas.asignaturaID=tbl_asignaturasxdocente.asignaturaID and tbl_docentes.DocenteID=tbl_asignaturasxdocente.docenteID and tbl_asignaturas.CursoID=tbl_cursos.CursoID and tbl_cursos.CursoID=tbl_seccionesxcurso.CursoID and tbl_secciones.SeccionID=tbl_seccionesxcurso.SeccionID and tbl_docentes.DocenteID=".$_SESSION['Docente'];
			$resultado=$conexion->ejecutarconsulta($consulta);


			$clase=$_POST['slcAsignaturas'];
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
										echo '<option value='.$arreglo['AsignaturaID'].'>'.$arreglo['nombreAsignatura'].' '.$arreglo['nombreCurso'].' '.$arreglo['nombreSeccion'].'</option>';
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

			$consulta="SELECT tbl_estudiantes.EstudianteID,nombre,apellido, nombreCurso, nombreSeccion,nombreAsignatura FROM tbl_usuarios,tbl_asignaturas,tbl_cursos,tbl_estudiantesxcurso,tbl_estudiantes,tbl_secciones,tbl_seccionesxcurso WHERE tbl_usuarios.usuarioID = tbl_estudiantes.usuarioID AND tbl_estudiantes.EstudianteID=tbl_estudiantesxcurso.estudianteID and tbl_estudiantesxcurso.CursoID=tbl_cursos.CursoID and tbl_asignaturas.CursoID=tbl_cursos.CursoID and tbl_usuarios.tipoUsuarioID=3 and tbl_cursos.CursoID=tbl_seccionesxcurso.CursoID and tbl_secciones.SeccionID=tbl_seccionesxcurso.SeccionID and tbl_asignaturas.asignaturaID=".$clase;
			$resultado=$conexion->ejecutarconsulta($consulta);
			echo '<div id="cambio">
			<div class="col-md-12 table-responsive">
            <table class="table table-bordered">
    			<thead>
    				<tr id="titulo">
    					<th>Nombre</th>
    					<th>Apellido</th>
    					<th>Curso</th>
    					<th>Seccion</th>
    					<th>Asignatura</th>
    					<th>Opciones</th>
    				</tr>

    			</thead>
    		<tbody>';

    		while($arreglo=$resultado->fetch_array()){
    			echo'<tr>
    				<td>'.$arreglo['nombre'].'</td>
    				<td>'.$arreglo['apellido'].'</td>
    				<td>'.$arreglo['nombreCurso'].'</td>
    				<td>'.$arreglo['nombreSeccion'].'</td>
    				<td>'.$arreglo['nombreAsignatura'].'</td>
    				<td><a class="btn btn-primary" href="AsignarNota.php?nombre='.$arreglo['nombre'].'&apellido='.$arreglo['apellido'].'&estudianteID='.$arreglo['EstudianteID'].'&asignaturaID='.$clase.'&nombreClase='.$arreglo['nombreAsignatura'].'">Calificar</a></td>
    			</tr>';
    		}

    		echo '</tbody>
    		</table>
    		</div>
    		</div>'
    		;


		}elseif ($_SESSION['TipoUsuario']=='3') {
		}
			?>
	</div>

	<!-- Modal -->
<!-- The Modal -->
		<footer class="py-5 bg-dark" style=" position: absolute; width: 100%;">
				<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</footer>

		<script type="text/javascript" src="Estilos/js/cargarContenido.js"></script>

	</body>
	</html>