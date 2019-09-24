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
			$consulta="SELECT tbl_asignaturas.asignaturaID,tbl_secciones.seccionID,tbl_cursos.cursoID,nombreAsignatura, nombreCurso,nombreSeccion FROM tbl_usuarios,tbl_asignaturas,tbl_cursos,tbl_secciones,tbl_docentes, tbl_asignaturasxdocente, tbl_seccionesxcurso,tbl_instituciones WHERE tbl_usuarios.usuarioID=tbl_docentes.usuarioID and tbl_docentes.DocenteID=tbl_asignaturasxdocente.docenteID AND tbl_asignaturasxdocente.asignaturaID=tbl_asignaturas.asignaturaID AND tbl_asignaturas.CursoID=tbl_cursos.CursoID AND tbl_seccionesxcurso.CursoID=tbl_cursos.CursoID AND tbl_seccionesxcurso.SeccionID=tbl_secciones.SeccionID and tbl_asignaturas.institucionID=tbl_instituciones.institucionID and tbl_cursos.institucionID=tbl_instituciones.institucionID and tbl_docentes.institucionID=tbl_instituciones.institucionID and tbl_docentes.institucionID=".$_SESSION['Institucion']." and  tbl_docentes.DocenteID=".$_SESSION['Docente'];
			$resultado=$conexion->ejecutarconsulta($consulta);
			$iteracion=0;
			while ($arreglo = $conexion->obtenerFila($resultado)) {
				if($iteracion==0){
					echo '<div class="row">';
				}
				echo ' <div class="col-md-4 mb-5">
				<div class="card h-100">
				<div class="card-body">
				<h2 class="card-title">'.$arreglo['nombreAsignatura'].'</h2>
				<p class="card-text">Curso: '.$arreglo['nombreCurso'].' Seccion: '.$arreglo['nombreSeccion'].'</p>
				</div>
				<div class="card-footer">
				<a href="ListaRecursos.php?AsignaturaID='.$arreglo['asignaturaID'].'" class="btn btn-primary btn-sm">More Info</a>
				</div>
				</div>
				</div>';

				$iteracion++;
				if ($iteracion==3) {
					echo '</div>';
					$iteracion =0;
				}
			}
		}elseif ($_SESSION['TipoUsuario']=='3') {
			$consulta="SELECT tbl_asignaturas.asignaturaID,tbl_secciones.seccionID,tbl_cursos.cursoID,nombreAsignatura, nombreCurso,nombreSeccion FROM tbl_usuarios,tbl_asignaturas,tbl_cursos,tbl_secciones,tbl_estudiantes, tbl_estudiantesxcurso, tbl_seccionesxcurso, tbl_instituciones WHERE tbl_usuarios.usuarioID=tbl_estudiantes.usuarioID and tbl_estudiantes.EstudianteID=tbl_estudiantesxcurso.estudianteID AND tbl_estudiantesxcurso.CursoID=tbl_cursos.CursoID AND tbl_asignaturas.CursoID=tbl_cursos.CursoID AND tbl_seccionesxcurso.CursoID=tbl_cursos.CursoID AND tbl_seccionesxcurso.SeccionID=tbl_secciones.SeccionID and tbl_estudiantes.SeccionID=tbl_secciones.SeccionID and tbl_asignaturas.institucionID=tbl_instituciones.institucionID and tbl_cursos.institucionID=tbl_instituciones.institucionID and tbl_estudiantes.institucionID=tbl_instituciones.institucionID and tbl_estudiantes.institucionID=".$_SESSION['Institucion']." AND tbl_estudiantes.EstudianteID=".$_SESSION['Estudiante'];
			$resultado=$conexion->ejecutarconsulta($consulta);
			$iteracion=0;
			while ($arreglo = $conexion->obtenerFila($resultado)) {
				if($iteracion==0){
					echo '<div class="row">';
				}
				echo ' <div class="col-md-4 mb-5">
				<div class="card h-100">
				<div class="card-body">
				<h2 class="card-title">'.$arreglo['nombreAsignatura'].'</h2>
				<p class="card-text">Curso: '.$arreglo['nombreCurso'].' Seccion: '.$arreglo['nombreSeccion'].'</p>
				</div>
				<div class="card-footer">
				<a href="ListaRecursosEstudiantes.php?AsignaturaID='.$arreglo['asignaturaID'].'" class="btn btn-primary btn-sm">More Info</a>
				</div>
				</div>
				</div>';

				$iteracion++;
				if ($iteracion==3) {
					echo '</div>';
					$iteracion =0;
				}
			}
		}
			?>
		</div>
	</div>
		<footer class="py-5 bg-dark" style="bottom: 0; position: absolute; width: 100%;">
				<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</footer>
	</body>
	</html>