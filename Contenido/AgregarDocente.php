<?php 
include("../clases/Conexion.php");
$conexion= new Conexion();
session_start();
if (empty($_SESSION)) {
	header('Location: index.php');
}
?>	
			<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<br>
				<h4 style="text-align: center;">
					Gestion de Docentes
				</h4>

				<hr>
				<div class="container">								
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link disabled" href="#AgregarDocente" aria-disabled="true">Agregar Docente</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#modificarDocente"  onclick="listar(''),cargarDiv('zonaContenido','Contenido/modificarDocente.php')">Modificar docente</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div id="existencia" class="container tab-pane active">
						<hr>

							<form method="post" action="Acciones/RegistrarDocente.php">
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
								</div>
								<div class="row mb-4" >
									<div class="col-lg-4">
										<label>Correo:</label>

										<input type="emailS" name="txtCorreo" placeholder="Correo" class="form-control">
									</div>
									<div class="col-lg-4">
										<label>Contraseña:</label>
										<input type="password" name="txtpassword" placeholder="password" class="form-control">
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