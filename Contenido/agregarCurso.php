<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
$conexion->mysql_set_charset("utf8");
if (empty($_SESSION)) {
	header('Location: index.php');
}
?>
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