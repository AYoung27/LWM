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
			Gestion de Docentes
		</h4>

		<hr>
		<div class="container">								
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="#AgregarDocente" onclick="cargarDiv('zonaContenido','Contenido/AgregarDocente.php')">Agregar Docente</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#ModificarDocentes" onclick="cargarDiv('zonaContenido','Contenido/modificarDocente.php')">Modificar Docente</a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#AsignarClase" aria-disabled="true" >Asignar clase</a>
				</li>
			</ul>
		</div>
		<div id="" class="container"><br>
			<div class="container">
					<div class="col-lg-12 mb-3">
						
							
					</div>
			</div>

