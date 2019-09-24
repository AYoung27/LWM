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
					Gestion de Asignaturas
				</h4>

				<hr>
				<div class="container">								
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link disabled" href="#AgregarAsignatura" aria-disabled="true">Agregar Asignatura</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#ModificarAsignatura" onclick="cargarDiv('zonaContenido','Contenido/eliminarAsignatura.php')" >Modificar Asignatura</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="existencia" class="container tab-pane active">
						<hr>

							<form method="post" action="Acciones/RegistrarAsignatura.php">
								<div class="row mb-4" >
									<div class="col-lg-6">
										<label>Nombre de la Asignatura:</label>
										<input type="text" name="txtNombre" placeholder="Nombre" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
										<label>Seleccione un curso de la lista:</label>
										<select class="custom-select" name="slcCursos">
											<option selected>Elija un curso</option>
											<?php 
												$consulta="SELECT tbl_cursos.CursoID,nombreCurso, nombreSeccion FROM tbl_cursos,tbl_secciones,tbl_seccionesxcurso, tbl_instituciones where tbl_cursos.CursoID=tbl_seccionesxcurso.CursoID and tbl_secciones.SeccionID=tbl_seccionesxcurso.SeccionID and tbl_instituciones.institucionID=tbl_cursos.institucionID and tbl_cursos.institucionID=".$_SESSION['Institucion'];
												$resultado=$conexion->ejecutarconsulta($consulta);
												while ($arreglo=$resultado->fetch_array()) {
													echo '<option value="'.$arreglo['CursoID'].'">'.$arreglo['nombreCurso'].' '.$arreglo['nombreSeccion'].'</option>';
												}
											 ?>
										</select>

									</div>
									<div class="col-lg-4">
										<label>Seleccione un docente de la lista:</label>
										<select class="custom-select" name="slcDocentes"> 
											<option selected>Elija un docente para la asignatura:</option>
											<?php 
												$consulta="SELECT nombre,apellido,tbl_docentes.DocenteID FROM tbl_usuarios,tbl_docentes, tbl_instituciones WHERE tbl_usuarios.usuarioID=tbl_docentes.usuarioID and tbl_docentes.institucionID=tbl_instituciones.institucionID and tbl_docentes.institucionID=".$_SESSION['Institucion'];
												$resultado=$conexion->ejecutarconsulta($consulta);
												while ($arreglo=$resultado->fetch_array()) {
													echo '<option value="'.$arreglo['DocenteID'].'">'.$arreglo['nombre'].' '.$arreglo['apellido'].'</option>';
												}

											 ?>
										</select>
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