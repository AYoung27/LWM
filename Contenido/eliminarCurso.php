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
					Gestion de Cursos
				</h4>

				<hr>
				<div class="container">								
					<ul class="nav justify-content-center">
						<li class="nav-item">
							<a class="nav-link " href="#AgregarCurso" onclick="cargarDiv('zonaContenido','Contenido/agregarCurso.php')" >Agregar Curso</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#ModificarCurso" aria-disabled="true">Eliminar Curso</a>
						</li>
					</ul>
				</div>
				<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
				<thead>
				   	<tr>
 						<th>Nombre Curso</th>
 						<th>Seccion</th>
 						<th>Opciones</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 						$consulta = "SELECT tbl_cursos.CursoID,nombreCurso,nombreSeccion from tbl_cursos,tbl_secciones, tbl_seccionesxcurso,tbl_instituciones where tbl_cursos.institucionID=tbl_instituciones.institucionID and tbl_cursos.CursoID=tbl_seccionesxcurso.CursoID and tbl_secciones.SeccionID=tbl_seccionesxcurso.SeccionID and tbl_instituciones.institucionID=".$_SESSION['Institucion'];
 						$resultado = $conexion->ejecutarconsulta($consulta);
 						$bandera=mysqli_num_rows($resultado);
 						if($bandera!=0){
 							while($arreglo = $resultado->fetch_array()){
 								 echo '<td>'.$arreglo['nombreCurso'].'</td>';
 								 echo '<td>'.$arreglo['nombreSeccion'].'</td>';
 								 echo '<td><button class="btn btn-danger"><i class="glyphicon glyphicon-remove" onclick="eliminarCurso('.$arreglo['CursoID'].')">Eliminar</button></td></tr>';

 							}
 						}else{
 							echo "<tr><td colspan=4 ><p style=\"text-align:center\">Aun no hay recursos en la plataforma</p></td>";
 						}

 					?>
 				</tbody>
 			</table>
 			</div>
</div>

