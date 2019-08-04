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
		<a class="navbar-brand pl-3" href="#"><img src="img/learn 1.png" height="40"></a>
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
	<div id="zonaContenido" class="col-md-8 mt-5 mb-5 ml-auto mr-auto">
		<div >
			<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<br>
				<h4 style="text-align: center;">
					Gestion de Estudiantes
				</h4>

				<hr>
				<div class="container">								
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link disabled" href="#AgregarEstudiante" aria-disabled="true">Agregar Estudiante</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#ModificarEstudiante" onclick="listarEstudiantes(''),cargarDiv('zonaContenido','Contenido/modificarEstudiante.php')" >Modificar Estudiante</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="existencia" class="container tab-pane active">
						<hr>

							<form method="post" action="Acciones/RegistrarEstudiante.php">
								<div class="row mb-4" >
									<div class="col-lg-6">
										<label>Nombre:</label>

										<input type="text" name="txtNombre" placeholder="Nombre" class="form-control">
									</div>
									<div class="col-lg-6">
										<label>Apellido:</label>
										<input type="text" name="txtApellido" placeholder="Apellido" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
										<label>Cedula:</label>
										<input type="number" name="txtCedula" placeholder="Cedula" class="form-control">
									</div>
									<div class="col-lg-4">
										<label>telefono:</label>
										<input type="number" name="txtTelefono" placeholder="Telefono" class="form-control">
									</div>
									<div class="col-lg-4">
										<label>Fecha de nacimiento:</label>
										<input type="date" name="txtFecha" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
										<label>Departamento:</label>
										<select class="custom-select" name="slcDepartamento"  class="form-control">
											<option selected>Elija un departamento</option>
											<?php
												$consulta="SELECT DepartamentoID, nombreDepartamento FROM tbl_departamentos";
 												$resultado=$conexion->ejecutarconsulta($consulta); 
 												while ($arreglo=$resultado->fetch_array()) {
 													echo '<option value="'.$arreglo[DepartamentoID].'">'.$arreglo[nombreDepartamento]."</option>";
 												}
 											?>
										</select>
									</div>
									<div class="col-lg-4">
										<label>Municipio:</label>
										<select class="custom-select" name="slcMunicipio"  class="form-control">
											<option selected>Elija un municipio</option>
											<?php
												$consulta="SELECT MunicipioID, nombreMunicipio FROM tbl_municipios";
 												$resultado=$conexion->ejecutarconsulta($consulta); 
 												while ($arreglo=$resultado->fetch_array()) {
 													echo '<option value="'.$arreglo[MunicipioID].'">'.$arreglo[nombreMunicipio]."</option>";
 												}
 											?>
										</select>
									</div>
									<div class="col-lg-4">
										<label>Curso:</label>
										<select class="custom-select form-control" name="slcCurso">
											<option selected>Elija un curso</option>
											<?php 
												$consulta="SELECT CursoID,nombreCurso FROM tbl_cursos";
												$resultado=$conexion->ejecutarconsulta($consulta);
												while($arreglo=$resultado->fetch_array()){
													echo '<option value="'.$arreglo[CursoID].'">'.$arreglo[nombreCurso]."</option>";
												}
											 ?>
										</select>
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
									<label>Seccion:</label>
										<select class="custom-select form-control" name="slcSeccion">
											<option selected>Elija una seccion</option>
											<?php 
												$consulta="SELECT SeccionID,nombreSeccion FROM tbl_secciones";
												$resultado=$conexion->ejecutarconsulta($consulta);
												while($arreglo=$resultado->fetch_array()){
													echo '<option value="'.$arreglo[SeccionID].'">'.$arreglo[nombreSeccion]."</option>";
												}
											 ?>
										</select>
									</div>
									<div class="col-lg-4">
										<label>Jornada:</label>
										<select class="custom-select form-control" name="slcJornada">
											<option selected>Elija una jornada</option>
											<?php 
												$consulta="SELECT JornadaID,nombreJornada FROM tbl_jornadas";
												$resultado=$conexion->ejecutarconsulta($consulta);
												while($arreglo=$resultado->fetch_array()){
													echo '<option value="'.$arreglo[JornadaID].'">'.$arreglo[nombreJornada]."</option>";
												}
											 ?>
										</select>
									</div>

								</div>
								<div class="row mb-4" >
									<div class="col-lg-4">
										<label>Correo:</label>

										<input type="emailS" name="txtCorreo" placeholder="Correo" class="form-control">
									</div>
									<div class="col-lg-4">
										<label>Contraseña:</label>
										<input type="password" name="txtPassword" placeholder="password" class="form-control">
									</div>
								</div>
								<div class="row mb-3">
									<button type="submit" class="btn btn-primary mr-2 ">Registrar</button>
									<a href="GestionUsuario.php" class="btn btn-danger">Cancelar</a>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="py-5 mw-100 bg-dark" style=" position: absolute; width: 100%;">
		<div class="container">
			<p class="text-center text-white">Copyright &copy; Learn With Me 2019</p>
		</div>
		<!-- /.container -->
	</footer>
	<script type="text/javascript" src="Estilos/js/Estudiantes.js"></script>
	<script src="Estilos/js/jquery.min.js"></script>
	<script src="Estilos/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.6.3.min.js"></script>
	

</body>
</html>