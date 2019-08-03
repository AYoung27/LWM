<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
if (empty($_SESSION)) {
	header('Location: index.php');
}
?>		

<div class="col-md-12">
	<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
		<br>
		<h4 style="text-align: center;">
			Gestion de Estudiantes
		</h4>

		<hr>
		<div class="container">								
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="#AgregarEstudiante" onclick="cargarDiv('zonaContenido','Contenido/AgregarEstudiante.php')">Agregar Estudiante</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#ModificarEstudiantes" aria-disabled="true">Modificar Estudiante</a>
				</li>
			</ul>
		</div>
		<div id="" class="container"><br>
			<div class="container">
						<label>Buscar un Estudiante</label>
						<div class="col-lg-12 mb-3">
							<input type="text" name="srcDocente" id="srcDocente" class="form-control" placeholder="Buscar un Estudiante" onkeyup="listarEstudiantes(this.value);">
						</div>
					</div>
					<hr>

					<div id="Estudiante"></div>
			