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
							<a class="nav-link " href="#agregarAsignatura" onclick="cargarDiv('zonaContenido','Contenido/agregarAsignatura.php')" >Agregar Asignatura</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#eliminarAsignatura" aria-disabled="true">Eliminar Asignatura</a>
						</li>
					</ul>
				</div>
				<div class="col-md-12 table-responsive">
				<table class="table table-bordered">
				<thead>
				   	<tr>
 						<th>Nombre</th>
 						<th>Seccion</th>
 						<th>Opciones</th>
 					</tr>
 				</thead>
 				<tbody>
 					<?php 
 						$consulta = "SELECT asignaturaID, nombreAsignatura,nombreCurso FROM tbl_asignaturas,tbl_cursos,tbl_instituciones WHERE tbl_asignaturas.institucionID=tbl_instituciones.institucionID and tbl_asignaturas.CursoID=tbl_cursos.CursoID and tbl_cursos.institucionID=tbl_instituciones.institucionID and tbl_instituciones.institucionID=".$_SESSION['Institucion'];
 						$resultado = $conexion->ejecutarconsulta($consulta);
 						$bandera=mysqli_num_rows($resultado);
 						if($bandera!=0){
 							while($arreglo = $resultado->fetch_array()){
 								 echo '<td>'.$arreglo['nombreAsignatura'].'</td>';
 								 echo '<td>'.$arreglo['nombreCurso'].'</td>';
 								 echo '<td><button class="btn btn-danger" onclick="eliminarAsignatura('.$arreglo['asignaturaID'].')"><i class="glyphicon glyphicon-remove">Eliminar</button></td></tr>';

 							}
 						}else{
 							echo "<tr><td colspan=4 ><p style=\"text-align:center\">Aun no hay asignaturas registradass para su institucion</p></td>";
 						}

 					?>
 				</tbody>
 			</table>
 			</div>
</div>

