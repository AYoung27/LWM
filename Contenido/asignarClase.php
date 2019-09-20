<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
$conexion->mysql_set_charset("utf8");
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
		<div id="" class="container mb-5"><br>
			<div class="container">
				<form action="Acciones/AsignarClase.php" method="POST">
					<div class="row">
						<div class="col-lg-4">
							<label>Seleccione un docente de la lista:</label>
							<select class="custom-select" name="slcDocentes"  class="form-control">
								<option selected>Elija un docente:</option>
								<?php
									$consulta="SELECT usuarioID, nombre, apellido FROM tbl_usuarios where tipousuarioID=2";
 									$resultado=$conexion->ejecutarconsulta($consulta);

 									while ($arreglo=$resultado->fetch_array()) {
 										echo '<option value="'.$arreglo['usuarioID'].'">'.$arreglo['nombre']." ".$arreglo['apellido']."</option>";
 									}
 								?>
							</select>
						</div>
						
							
					</div>
					<div class="row">
						<div class="col-lg-4 mt-4">
							<label>Seleccione una asignatura de la lista:</label>
							<select class="custom-select" name="slcAsignaturas"  class="form-control">
								<option selected>Elija una asignatura:</option>
								<?php
									$consulta="SELECT asignaturaID, nombreAsignatura FROM tbl_asignaturas";
 									$resultado=$conexion->ejecutarconsulta($consulta);

 									while ($arreglo=$resultado->fetch_array()) {
 										echo '<option value="'.$arreglo['asignaturaID'].'">'.$arreglo['nombreAsignatura']."</option>";
 									}
 								?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 mt-4">
							<label>Seleccione una seccion de la lista:</label>
							<select class="custom-select" name="slcSecciones"  class="form-control">
								<option selected>Elija una seccion:</option>
								<?php
									$consulta="SELECT seccionID, nombreSeccion FROM tbl_secciones";
 									$resultado=$conexion->ejecutarconsulta($consulta);

 									while ($arreglo=$resultado->fetch_array()) {
 										echo '<option value="'.$arreglo['seccionID'].'">'.$arreglo['nombreSeccion']."</option>";
 									}
 								?>
							</select>
						</div>
					</div>
				</form>
			</div>
		</div>


