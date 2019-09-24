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
			$consulta="SELECT tbl_asignaturas.AsignaturaID, nombreAsignatura , nombreCurso,nombreSeccion from tbl_asignaturas, tbl_asignaturasxdocente,tbl_docentes, tbl_cursos, tbl_secciones,tbl_seccionesxcurso where tbl_asignaturas.asignaturaID=tbl_asignaturasxdocente.asignaturaID and tbl_docentes.DocenteID=tbl_asignaturasxdocente.docenteID and tbl_asignaturas.CursoID=tbl_cursos.CursoID and tbl_cursos.CursoID=tbl_seccionesxcurso.CursoID and tbl_secciones.SeccionID=tbl_seccionesxcurso.SeccionID and tbl_docentes.DocenteID=".$_SESSION['Docente'];
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
										echo '<option value='.$arreglo['AsignaturaID'].'>'.$arreglo['nombreAsignatura'].' '.$arreglo['nombreCurso'].' '.$arreglo['nombreSeccion'].'</option>';
									}
								echo '</select>
							</div>
							<div class="col-md-4 mt-4">
								<button class="btn btn-primary ml-5" >Seleccionar Asignatura</button>
							</div>
						</div>
						<div class="row">
							<div id="Alumnos"></div>
						</div>
					</div>
				</form>

			</div>';

		}elseif ($_SESSION['TipoUsuario']=='3') {
			$consulta="SELECT `Nota1`, `Nota2`, `Nota3`, `Nota4`,nombreAsignatura,nombreCurso, nombreSeccion FROM tbl_calificaciones,tbl_estudiantes,tbl_cursos,tbl_secciones,tbl_seccionesxcurso,tbl_estudiantesxcurso, tbl_instituciones,tbl_asignaturas WHERE tbl_calificaciones.asignaturaID=tbl_asignaturas.asignaturaID AND tbl_calificaciones.estudianteID=tbl_estudiantes.EstudianteID AND tbl_asignaturas.CursoID=tbl_cursos.CursoID AND tbl_estudiantesxcurso.CursoID=tbl_cursos.CursoID AND tbl_estudiantesxcurso.estudianteID = tbl_estudiantes.EstudianteID and tbl_estudiantes.SeccionID=tbl_secciones.SeccionID and tbl_cursos.CursoID = tbl_seccionesxcurso.CursoID and tbl_seccionesxcurso.SeccionID=tbl_secciones.SeccionID and tbl_asignaturas.institucionID=tbl_instituciones.institucionID AND tbl_estudiantes.institucionID=tbl_instituciones.institucionID and tbl_cursos.institucionID= tbl_instituciones.institucionID and tbl_estudiantes.EstudianteID=".$_SESSION['Estudiante']." and tbl_instituciones.institucionID=".$_SESSION['Institucion'];
			$resultado=$conexion->ejecutarconsulta($consulta);
			echo '<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<br>
				<h4 style="text-align: center;">
					Calificaciones
				</h4>

				<hr>
			<div id="cambio">
			<div class="col-md-12 table-responsive">
            <table class="table table-bordered">
    			<thead>
    				<tr id="titulo">
    					<th>Asignatura</th>
    					<th>I Parcial</th>
    					<th>II Parcial</th>
    					<th>III Parcial</th>
    					<th>IV Parcial</th>
    				</tr>
    			</thead>
    		<tbody>';

    		while ($arreglo=$resultado->fetch_array()) {
    			# code...
    			echo '<tr>
    			<td>'.$arreglo['nombreAsignatura'].'</td>
    			<td>'.$arreglo['Nota1'].'</td>
    			<td>'.$arreglo['Nota2'].'</td>
    			<td>'.$arreglo['Nota3'].'</td>
    			<td>'.$arreglo['Nota4'].'</td>
    			</tr>';
    		}
    		
    		echo '</tbody>
    		</table>
    		</div>
    		</div>
    		</div>'
    		;
		}
			
			?>
		</div>
	</div>
		<footer class="py-5 bg-dark" style="bottom:0; position: absolute; width: 100%;">
				<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</footer>
	</body>
	</html>