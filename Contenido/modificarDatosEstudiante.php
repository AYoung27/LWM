<?php 
	include("../clases/Conexion.php");
	$conexion= new Conexion();
	$conexion->mysql_set_charset("utf8");
	session_start();
	if (empty($_SESSION)) {
		header('Location: Login.php');
	}

	$consulta="SELECT nombre,apellido,correo,cedula,fechaNacimiento,telefono,tbl_departamentos.nombreDepartamento,tbl_departamentos.departamentoID, tbl_municipios.NombreMunicipio,tbl_municipios.municipioID,tbl_secciones.SeccionID,tbl_secciones.nombreSeccion,tbl_jornadas.JornadaID, tbl_jornadas.nombreJornada FROM tbl_usuarios , tbl_departamentos,tbl_municipios, tbl_jornadas,tbl_secciones, tbl_estudiantes WHERE tbl_departamentos.DepartamentoID=tbl_usuarios.DepartamentoID and tbl_usuarios.municipioID=tbl_municipios.MunicipioID AND tbl_secciones.SeccionID=tbl_estudiantes.SeccionID AND tbl_jornadas.JornadaID=tbl_estudiantes.JornadaID and tbl_usuarios.usuarioID=tbl_estudiantes.usuarioID and tbl_usuarios.usuarioID=".$_POST['usuarioID'];
	$resultado=$conexion->ejecutarconsulta($consulta);
	$data=$conexion->obtenerfila($resultado);
?>
	<div class="col-md-12" style="border-width: 1px 1px 1px 1px; border-style: solid; border-color: lightgray;">
				<br>
				<h4 style="text-align: center;">
					Gestion de Estudiante
				</h4>

				<hr>
						<hr>

							<form method="post" action="Acciones/modificarRegistroEstudiante.php">
								<div class="row mb-4" >
									<div class="col-lg-6">
										<label>Ingresa Nuevo nombre:</label>

										<input type="text" name="txtNombre"  value="<?php echo $data['nombre']; ?>" class="form-control">
									</div>
									<div class="col-lg-6">
										<label>Ingresa nuevo apellido:</label>
										<input type="text" name="txtApellido" value="<?php echo $data['apellido']; ?>" class="form-control">
									</div>
								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
										<label>Ingresa nuevo numero de cedula:</label>
										<input type="number" name="txtCedula" value="<?php echo $data['cedula']; ?>" class="form-control">
									</div>
									<div class="col-lg-4">
										<label>Ingresa nuevo numero de telefono:</label>
										<input type="number" name="txtTelefono" value="<?php echo $data['telefono']; ?>" class="form-control">
									</div>

								</div>
								<div class="row mb-4">
									<div class="col-lg-4">
										<label>Selecciona un nuevo departamento:</label>
										<select class="custom-select" name="slcDepartamento"  class="form-control">
											<option value="<?php echo $data['departamentoID']; ?>" selected> <?php echo $data['nombreDepartamento']  ?></option>
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
										<label>Selecciona un nuevo municipio:</label>
										<select class="custom-select" name="slcMunicipio"  class="form-control">
											<option value="<?php echo $data['municipioID']; ?>" selected> <?php echo $data['NombreMunicipio'] ?> </option>
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
								<div class="row mb-4">
									<div class="col-lg-4">
									<label>Seccion:</label>
										<select class="custom-select form-control" name="slcSeccion">
											<option value="<?php echo $data['SeccionID']; ?>" selected><?php echo $data['nombreSeccion'] ?></option>
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
											<option value="<?php echo $data['JornadaID']; ?>" selected><?php echo $data['nombreJornada'] ?></option>
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
								<div class="row mb-3" >
									<div class="col-lg-6">
										<label>Ingresa nuevo correo:</label>

										<input type="email" name="txtCorreo" value="<?php echo $data['correo']; ?>" class="form-control">
										<input type="number" name="txtIdentificador" id="txtIdentificador" value="<?php echo $_POST['usuarioID'];?>" style="display: none;">
									</div>

								</div>
								<div class="row mb-3 ml-2">
									<button type="submit" class="btn btn-primary mr-2 ">Modificar Estudiante</button>
									<a href="#" class="btn btn-danger" onclick="cargarDiv('zonaContenido', 'Contenido/modificarEstudiante.php')">Cancelar</a>
								</div>
							</form>

						</div>
