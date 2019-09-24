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
							<a class="nav-link disabled" href="#ModificarCurso" aria-disabled="true">Modificar Curso</a>
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
 						$consulta = "SELECT nombreArchivo, Descripcion, tipo from tbl_recursosestudiantiles where asignaturaID=".$asignaturaID;
 						$resultado = $conexion->ejecutarconsulta($consulta);
 						$bandera=mysqli_num_rows($resultado);
 						if($bandera!=0){
 							while($arreglo = $resultado->fetch_array()){
 								 echo '<td>'.$arreglo['nombreArchivo'].'</td>';
 								 echo '<td>'.$arreglo['Descripcion'].'</td>';
 								 echo '<td><button class="btn btn-danger"><i class="glyphicon glyphicon-remove">Eliminar</button></td></tr>';

 							}
 						}else{
 							echo "<tr><td colspan=4 ><p style=\"text-align:center\">Aun no hay recursos en la plataforma</p></td>";
 						}

 					?>
 				</tbody>
 			</table>
 			</div>
</div>

