<?php 
session_start();
include("Clases/Conexion.php");
$conexion = new Conexion();
$conexion->mysql_set_charset("utf8");
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
	<div id="zonaContenido" class="col-md-8 mt-5 mb-5 ml-auto mr-auto">
		<div >
			<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<br>
				<h4 style="text-align: center;">
					Gestion de Cursos
				</h4>

				<hr>
				<div class="container">								
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link disabled" href="#AgregarCurso" aria-disabled="true">Agregar Curso</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#ModificarCurso" onclick="cargarDiv('zonaContenido','Contenido/eliminarCurso.php')" >Eliminar Curso</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="existencia" class="container tab-pane active">
						<hr>

							<form method="post" action="Acciones/RegistrarCurso.php">
								<div class="row mb-4" >
									<div class="col-lg-6">
										<label>Nombre Curso:</label>
										<input type="text" name="txtNombre" placeholder="Nombre" class="form-control">
									</div>
								</div>
								<div class="row ">
									<div class="col-lg-8">
										<label>Digite el numero de secciones que desea abrir para este curso:</label>

									</div>
								</div>
								<div class="row mb-4" >
									<div class="col-lg-6">
										<input type="number" name="txtSecciones" placeholder="Numero de secciones" class="form-control">
									</div>
								</div>	
								<div class="row mb-3">
									<button type="submit" class="btn btn-primary mr-2 ">Registrar</button>
									<a href="GestionCursos.php" class="btn btn-danger">Cancelar</a>
								</div>
							</form>

						</div>
					</div>
				</div>
				<a href="GestionCursos.php" class="btn btn-primary mt-3">Regresar</a>
			</div>
		</div>
	</div>
	<footer class="py-5 mw-100 bg-dark" style=" position: absolute; width: 100%;">
		<div class="container">
			<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</div>
		<!-- /.container -->
	</footer>
	<script type="text/javascript">
		function eliminarCurso(cursoID){
      if (confirm("Realmente desea eliminar este curso?")) {
        window.location.href= "Acciones/eliminarCurso.php?cursoID="+cursoID;
        } else {

      }
	}
	</script>
	<script type="text/javascript" src="Estilos/js/docentes.js"></script>
	<script src="Estilos/js/jquery.min.js"></script>
	<script src="Estilos/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
	

</body>
</html>